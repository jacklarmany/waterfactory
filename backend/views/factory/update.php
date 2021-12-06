<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Factory */

$this->title = Yii::t('app', 'Update Factory: {name}', [
    'name' => $model->factoryname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factories'), 'url' => ['index', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => $model->factoryname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-3 border">

            <div class="factory-update">

                <h2><?= Html::encode($this->title) ?></h2>
                <hr>
                <?= $this->render('_form', [
                    'model' => $model
                ]) ?>

            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>