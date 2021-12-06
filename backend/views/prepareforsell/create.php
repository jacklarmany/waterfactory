<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prepareforsell */

$this->title = Yii::t('app', 'Create Prepareforsell');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prepareforsells'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepareforsell-create">

    <?= $this->render('_form', [
        'model' => $model,
        'waterid' => $waterid,
    ]) ?>

</div>
