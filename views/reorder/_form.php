<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reorder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reorder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProductID')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
