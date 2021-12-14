<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Water */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="water-form p-4">

    <?php $form = ActiveForm::begin(['options' => ['enctype' =>'multipart/form-data']]); ?>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true,'class' => 'btn-block']) ?>
    <div class="row">
        <div class="col-sm-8"><?= $form->field($model, 'watername')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-4">
            <?= $form->field($model, 'unit')->dropDownList(['Bottle' => Yii::t('app', 'Bottle'), 'Pack' => Yii::t('app', 'Pack'), 'Kat' => Yii::t('app', 'Kat'), 'Touk' => Yii::t('app', 'Touk'), 'Sorb' => Yii::t('app', 'Sorb')]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><?= $form->field($model, 'quality')->textInput() ?></div>
        <div class="col-sm-8"> <?= $form->field($model, 'sellprice')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>