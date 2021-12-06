<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prepareforsell */

$this->title = Yii::t('app', 'Update Prepareforsell: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prepareforsells'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prepareforsell-update">

    <?= $this->render('_form', [
        'model' => $model,
        'waterid' => $model->waterid,
    ]) ?>

</div>
