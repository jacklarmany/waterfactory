<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="site-signup p-4 bg-white shadow border ">
                <h1><?= Html::encode($this->title) ?></h1>
                <p>Please fill out the following fields to signup:</p>
                <br>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']) ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => false, 'type'=>'text', 'placeholder' => Yii::t('app','Username')])->label(false); ?>
                <?= $form->field($model, 'email')->textInput(['type'=>'email', 'placeholder' => Yii::t('app','Email')])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['type'=>'password', 'placeholder' => Yii::t('app', 'Password')])->label(false); ?>
                <div class="form-group text-center">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>