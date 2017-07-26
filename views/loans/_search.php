<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'loanId') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'interest') ?>

    <?= $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'dateApplied') ?>

    <?php // echo $form->field($model, 'dateLoanEnds') ?>

    <?php // echo $form->field($model, 'campaign') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
