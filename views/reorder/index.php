<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Open Reorders';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Error!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Success!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<div class="app-content content">
    <div class="content-header row">
    </div>
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">
                    <div class="content-body">
                        <!-- Zero configuration table -->
                        <section id="configuration">
                            <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header card--header">
                                                    <h4></h4>

                                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                                        </ul>
                                                    </div>
                                            </div>
                                            <div class="card-content collapse show">
                                                    <div class="card-body">
                                                    <table class="table table-striped table-bordered zero-configuration">
                                                        <thead>
                                                            <tr>
                                                                <th>Count</th>
                                                                <th>Reorder ID</th>
                                                                <th>Product ID</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;

                                                            foreach ($model as $key => $row) {
                                                                ++$i;
                                                                ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td><?= $row['ReorderID'] ?></td>
                                                                    <td><?= $row['ProductID'] ?></td>
                                                                    <td><?= $row['Status'] ?></td>
                                                                    <td align="center">
                                                                        <?= Html::a('<i class="ft-eye"></i> Restock', ['restock', 'id' => $row->ReorderID], ['class' => '']) ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                        </tbody>
                                                    </table>


                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                        </section>
                        <!--/ Zero configuration table -->
                    </div>
            </section>
        </div>
    </div>
</div>
