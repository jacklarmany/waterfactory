<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Factory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'logo')->fileInput(['maxlength' => true, 'class' => 'border p-1'])->label(Yii::t('app','Logo')) ?>
    <?= $form->field($model, 'factoryname')->textInput(['maxlength' => true])->label(Yii::t('app','Factory name')) ?>
    <?= $form->field($model, 'factoryname_en')->textInput(['maxlength' => true])->label(Yii::t('app','Factory name')) ?>

    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
