<?php

use backend\models\Unit;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Water */
/* @var $form yii\widgets\ActiveForm */
?>




<div class="water-form p-5">
<br>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true, 'class' => 'btn-block'])->label(false) ?>
    <div class="row">
        <div class="col-sm-8"><?= $form->field($model, 'watername')->textInput(['placeholder' => Yii::t('app', 'Water name Lao'), 'maxlength' => true])->label(false); ?></div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'unitid')->widget(Select2::className(), [
                'data' => \yii\helpers\ArrayHelper::map(Unit::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all(), 'id', 'unitname'),
                'options' => ['placeholder' => Yii::t('app', 'Select a Unit ...')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'size' => 'sm'
                ],
            ])->label(false);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8"><?= $form->field($model, 'watername_en')->textInput(['placeholder' => Yii::t('app', 'Water name English'), 'maxlength' => true])->label(false); ?></div>
    </div>
    <div class="row">
        <div class="col-sm-12"> <?= $form->field($model, 'sellprice')->textInput(['placeholder' => Yii::t('app', 'Set Sell Price'), 'maxlength' => true])->label(false); ?></div>
    </div>
    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>