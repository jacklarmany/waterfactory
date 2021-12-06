<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Factory */

$this->title = Yii::t('app', 'Create Factory');
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factories'), 'url' => ['index']];

?>


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-3 bg-white rounded shadow-sm" style="border:1px solid #dddfe2">

            <div class="factory-create">
                <?php $this->params['breadcrumbs'][] = $this->title; ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <hr>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>