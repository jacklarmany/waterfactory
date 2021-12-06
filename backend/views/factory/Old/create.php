<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Factory */

$this->title = Yii::t('app', 'Create Factory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
