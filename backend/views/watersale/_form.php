<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Watersale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="watersale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'waterid')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'sellprice')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'amountdiscount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalreceiveamount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customerid')->textInput() ?>

    <?= $form->field($model, 'billno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stuffasuserid')->textInput() ?>

    <?= $form->field($model, 'factoryid')->textInput() ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
