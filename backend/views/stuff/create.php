<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Stuff */

$this->title = Yii::t('app', 'Create Stuff');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stuffs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
