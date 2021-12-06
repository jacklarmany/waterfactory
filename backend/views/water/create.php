<?php

use yii\helpers\Html;

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

            <div class="water-create">
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