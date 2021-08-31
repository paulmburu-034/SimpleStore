<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->ProductID;
// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="app-content content">
    <div class="content-header"></div>
    <div class="content-wrapper">
        <!-- <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?> -->
        <?=Yii::$app->controller->renderPartial('//layouts/alert');?>
        <div class="content-body">
            <section class="flexbox-container">
                    <div class="content-body">
                        <div class="card">
                            <div class="card-header card--header">
                                <h4 class="card-title"></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline list-actions" style="float: right;">
                                        <li style="display:inline;"><?= Html::a('Sell', ['sale', 'ProductID' => $model->ProductID], ['class' => 'btn btn-success']) ?></li><!-- 
                                        <li style="display:inline;"><?= Html::a('Update', ['update', 'ProductID' => $model->ProductID], ['class' => 'btn btn-primary']) ?></li>
                                        <li style="display:inline;"><?= Html::a('Delete', ['delete', 'ProductID' => $model->ProductID], [
                                                'class' => 'btn btn-danger',
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ],
                                            ]) ?></li> -->

                                        <li style="display:inline;"><?= Html::a('Close', ['index', 'ProductID' => $model->ProductID], ['class' => 'btn btn-danger']) ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <!-- content -->
                                    <div class="products-view">
                                        <?= DetailView::widget([
                                            'model' => $model,
                                            'attributes' => [
                                                'ProductID',
                                                'ProductName',
                                                'ProductQuantity',
                                                'ReorderLevel',
                                            ],
                                        ]) ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>