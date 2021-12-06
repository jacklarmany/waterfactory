<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WaterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="water-search border rounded p-3">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'watername')->label(false); ?>
        </div>
        <div class="col-md-4">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>