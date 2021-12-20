<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Watersale */

$this->title = Yii::t('app', 'Create Watersale');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Watersales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watersale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
