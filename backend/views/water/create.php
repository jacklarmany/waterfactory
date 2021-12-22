<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Water */

$this->title = Yii::t('app', 'Create Water');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Waters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-3 bg-white rounded shadow-sm" style="border:1px solid #dddfe2">
            <p class="col-sm-12 text-right">
                <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/icons/substract20.png"></a>
                <a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/icons/togle-fullscreen20.png" width="20"></a>
                <a href="<?= Url::to('index.php?r=water') ?>"><img src="<?= Yii::$app->request->baseUrl ?>/icons/close20.png"></a>
            </p>
            <p class="text-primary h2 text-bold"><?= Html::encode($this->title) ?></p>
            <div class="water-create pl-r3 pr-3">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<br>