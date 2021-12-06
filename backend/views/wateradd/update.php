<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Wateradd */

$this->title = Yii::t('app', 'Update Wateradd: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wateradds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 p-3 bg-white rounded shadow-sm" style="border:1px solid #dddfe2">

            <div class="wateradd-update">
                <?= Html::encode($this->title) ?>
                <hr>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>