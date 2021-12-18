<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WateraddSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Wateradds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wateradd-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //echo Html::a(Yii::t('app', 'Create Wateradd'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'date',
            'waterid',
            'avalibledquantity',
            'unit',
            //'factoryid',
            //'userid',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="fa fa-eye"></span>',
                            $url,
                            [
                                'class' => 'btn-sm  btn-success btn_crud',
                                'title' => Yii::t('app', 'View')
                            ]
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '<span class="fa fa-trash-o"></span>',
                            $url,
                            [
                                'data-method' => "post",
                                'data-confirm' => Yii::t('app', 'Are you want to delete this item.?'),
                                'class' => 'btn-sm btn-danger btn_crud',
                                'title' => Yii::t('app', 'Delete')
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>


</div>
