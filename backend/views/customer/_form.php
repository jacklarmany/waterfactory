<?php

use SebastianBergmann\CodeCoverage\Report\PHP;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class=" bg-white p-5">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6"> <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6"><?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-12"><?= $form->field($model, 'dob')->textInput(['type' => 'date']) ?></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'gender')->dropDownList(['male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?></div>
                <div class="col-md-6"> <?= $form->field($model, 'cardid')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-12"> <?= $form->field($model, 'village')->dropDownList(['male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female')]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-12"> <?= $form->field($model, 'district')->dropDownList(['male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female')]) ?></div>
            </div>
            <div class="row">
                <div class="col-md-12"> <?= $form->field($model, 'province')->dropDownList(['promt' => Yii::t('app', 'Select option'), 'male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female')]) ?></div>
            </div>
            <div class="form-group text-right">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>







<?php

// $script = <<< JS
//     $('form#{$model->formName()}').on('beforSubmit', function(e){
//         var \$form = $(this);
//         $.post(
//             \$form.attr("action"),
//             \$form.serialize()
//         ).done(function(result){

//             if(result == 1){
//                 $(\$form).trigger("reset");
//                 $.pjax.reload({container:'#customergrid'});
//             }else{
//                 $("#message").html();
//             }
//         }).fail(function(){
//             console.log("server Error");
//         });
//         return false;
//     });
// JS;
// $this->registerJs($script);
?>