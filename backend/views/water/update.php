<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Water */

$this->title = Yii::t('app', 'Update Water: {name}', [
    'name' => $model->watername,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Waters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
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
            <h5 class="text-primary"> <?= Html::encode($this->title) ?></h5>
            <hr>
            <div class="water-update pl-3 pr-3">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>