<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Water */

$this->title = $model->watername;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Waters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="water-view">

    <p class="text-right">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image',
            'watername',
            'unitid',
            'avalibledquantity',
            'sellprice',
            'factoryid',
            'userid',
        ],
    ]) ?>








</div>