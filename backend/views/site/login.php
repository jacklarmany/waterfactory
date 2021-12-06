<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
?>



<div class="container">
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="mt-5 pt-5 rounded text-center">
                <h1 class="text-primary title">ລະບົບບໍລິຫານຈັດການໂຮງງານນໍ້າດື່ມ</h1>
                <p class=" text-center"> ຮອດຍຸກທີ່ທັນສະໄໝ ຄວນໃຊ້ໂປຣແກຣມ ເພື່ອບໍລິຫານ <br> ໂຮງານຂອງທ່ານ ສະດວກ ວອງໄວ ປອດໄພ ສະບາຍໃຈຕະຫຼອດເວລາ</p>
                <br>
                <a class="btn btn-border video-popup" href="/waterfactory/frontend/web/index.php?r=site/signup#">ລົງທະບຽນນຳໃຊ້ &raquo;</a>
            </div>
        </div>
        <div class="col-md-6 p-5">
            <div class="mt-5 bg-white pt-5 pb-4 pr-5 pl-5 rounded shadow"  style="margin-left: 30px; margin-right:30px;">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['style' => 'height:50px;', 'placeholder' => Yii::t('app', 'Username')])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['style' => 'height:50px;', 'placeholder' => Yii::t('app', 'Password')])->label(false) ?>

                <div class="row">
                    <div class="col-sm-6"> <?= $form->field($model, 'rememberMe')->checkbox() ?></div>
                    <div class="col-sm-6 text-right mb-2"><a href="index.php?r=site/password"><?= Yii::t('app', 'Forgot password');?> </a></div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['style' => 'height:50px;', 'class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>