<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Wateradd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wateradd-form p-4">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'avalibledquantity')->textInput() ?>
    <div class="form-group text-center">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
