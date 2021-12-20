<?php
use backend\models\Stuff;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Stuffasuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stuffasuser-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field($model, 'stuffid')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(Stuff::find()->all(), 'id', ['fullname']),
        'options' => ['placeholder' => Yii::t('app', 'Select a state ...')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(Yii::t('app', 'Select staff'));
    ?>

    <?= $form->field($model, 'uname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pword')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>