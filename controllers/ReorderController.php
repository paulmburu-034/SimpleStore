<?php

namespace app\controllers;

use app\models\Reorder;
use app\models\Products;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReorderController implements the CRUD actions for Reorder model.
 */
class ReorderController extends Controller
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
     * Lists all Reorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Reorder::find()->where(['Status'=>'Open'])->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionRestock($id){
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $data = $this->request->post();
            $product = Products::findOne(['ProductID'=>$model->ProductID]);
            $amount_after_add = $product->ProductQuantity + (int)$data['Reorder']['QuantityAdded'];
            $product->ProductQuantity = $amount_after_add;
            $product->ReorderStatus = 'Released';
            $model->Status = 'Released';
            if ($model->save() && $product->save()) {
                // code...
                Yii::$app->session->setFlash('success', "Product Quantity updated successfully");
                return $this->redirect(['index']);
            }else{
                Yii::$app->session->setFlash('error', "Product Quantity update failed to commit");
            }
        }
        return $this->render('restock', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Reorder model.
     * @param int $ReorderID Reorder ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ReorderID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ReorderID),
        ]);
    }

    /**
     * Creates a new Reorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reorder();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ReorderID' => $model->ReorderID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ReorderID Reorder ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ReorderID)
    {
        $model = $this->findModel($ReorderID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ReorderID' => $model->ReorderID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ReorderID Reorder ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ReorderID)
    {
        $this->findModel($ReorderID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ReorderID Reorder ID
     * @return Reorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ReorderID)
    {
        if (($model = Reorder::findOne($ReorderID)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
