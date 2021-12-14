<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Wateradd */

$this->title = Yii::t('app', 'Create Wateradd');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wateradds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-2 bg-white rounded shadow-sm" style="border:1px solid #dddfe2">
            <p class="col-sm-12 text-right">
                <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/icons/substract20.png"></a>
                <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/icons/togle-fullscreen20.png" width="20"></a>
                <a href="<?= Url::to('index.php?r=water') ?>"><img src="<?= Yii::$app->request->baseUrl ?>/icons/close20.png"></a>
            </p>
            
            <h5 class="text-primary"><?= Html::encode($this->title) ?></h5>
            <hr>
            <div class="wateradd-create p-3">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>