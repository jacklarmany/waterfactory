<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = Yii::t('app', 'Create Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-2 bg-white rounded shadow-sm" style="border:1px solid #dddfe2">
            <p class="col-sm-12 text-right">
                <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/icons/substract20.png"></a>
                <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/icons/togle-fullscreen20.png"></a>
                <a href="index.php?r=site"><img src="<?= Yii::$app->request->baseUrl ?>/icons/close20.png"></a>
            </p>
            
            <h5 class="text-primary"><?= Html::encode($this->title) ?></h5>
            <hr>
            <div class="factory-create p-5">         
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>