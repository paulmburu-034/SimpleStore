<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reorders';
//$this->params['breadcrumbs'][] = $this->title;
?>
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
                                                                <th>Product Name</th>
                                                                <th>Product Quantity</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;

                                                            foreach ($model as $key => $row) {
                                                                ++$i;
                                                                $product = Products::findOne(['ProductID'=>$row['ProductID']]);
                                                                ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td><?= $row['ReorderID'] ?></td>
                                                                    <td><?= $row['ProductID'] ?></td>
                                                                    <td><?= $product->ProductName ?></td>
                                                                    <td><?= $product->ProductQuantity ?></td>
                                                                    <td><?= $row['Status'] ?></td>
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
