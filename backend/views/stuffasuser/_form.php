<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Stuffasuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stuffasuser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stuffid')->textInput() ?>

    <?= $form->field($model, 'factoryid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
