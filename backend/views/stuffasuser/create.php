<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stuffasuser */

$this->title = Yii::t('app', 'Create Stuffasuser');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stuffasusers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuffasuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
