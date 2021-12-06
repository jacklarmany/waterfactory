<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WaterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="water-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'watername') ?>

    <?= $form->field($model, 'unit') ?>

    <?= $form->field($model, 'quality') ?>

    <?php // echo $form->field($model, 'sellprice') ?>

    <?php // echo $form->field($model, 'factoryid') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
