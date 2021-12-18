<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrepareforsellSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prepareforsell-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'waterid') ?>

    <?= $form->field($model, 'quality') ?>

    <?= $form->field($model, 'sellprice') ?>

    <?= $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'customerid') ?>

    <?php // echo $form->field($model, 'factoryid') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
