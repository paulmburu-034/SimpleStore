<?php

namespace app\controllers;

use app\models\Products;
use app\models\Reorder;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'ProductID' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param int $ProductID Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ProductID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ProductID),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ProductID' => $model->ProductID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ProductID Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSale($ProductID)
    {
        $model = $this->findModel($ProductID);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $data = $this->request->post();
            $amount_after_sale = $model->ProductQuantity - (int)$data['Products']['Amount_sold'];
            $model->ProductQuantity = $amount_after_sale;
            if ($model->save()) {
                // code...
                return $this->redirect(['view', 'ProductID' => $model->ProductID]);
            }else{
                Yii::$app->session->setFlash('message', "Sale failed to commit");
            }
        }

        return $this->render('sale', [
            'model' => $model,
        ]);
    }
    public function actionOrders(){
        $model = Reorder::find()->all();
        return $this->render('orders', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ProductID Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ProductID)
    {
        $model = $this->findModel($ProductID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ProductID' => $model->ProductID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ProductID Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ProductID)
    {
        $this->findModel($ProductID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ProductID Product ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ProductID)
    {
        $id = $ProductID;
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
