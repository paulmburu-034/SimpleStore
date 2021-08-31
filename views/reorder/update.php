<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reorder */

$this->title = 'Update Reorder: ' . $model->ReorderID;
$this->params['breadcrumbs'][] = ['label' => 'Reorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ReorderID, 'url' => ['view', 'ReorderID' => $model->ReorderID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
