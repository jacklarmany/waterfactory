<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php // $form->field($model, 'id') 
    ?>

    <?php echo $form->field($model, 'fullname')->textInput(['placeholder' => Yii::t('app', 'Search ...'), 'class' => 'shadow-sm form-control'])->label(false) ?>

    <?php // $form->field($model, 'dob') 
    ?>

    <?php // $form->field($model, 'gender') 
    ?>

    <?php // $form->field($model, 'cardid') 
    ?>

    <?php // echo $form->field($model, 'tel') 
    ?>

    <?php // echo $form->field($model, 'village') 
    ?>

    <?php // echo $form->field($model, 'district') 
    ?>

    <?php // echo $form->field($model, 'province') 
    ?>

    <?php // echo $form->field($model, 'factoryid') 
    ?>

    <?php // echo $form->field($model, 'userid') 
    ?>

    <div class="form-group" style="display:none">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>