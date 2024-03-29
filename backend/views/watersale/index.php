<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\WatersaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Watersales');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watersale-index bg-white p-2">

    <h1><?php Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a(Yii::t('app', 'Create Watersale'), ['create'], ['class' => 'btn btn-success']) 
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'date',
            // 'time',
            'billno',
            'waterid',
            'quantity',
            'sellprice',
            'amount',
            //'discount',
            //'amountdiscount',
            //'totalreceiveamount',
            //'customerid',
            //'stuffasuserid',
            //'factoryid',
            //'userid',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'text-right pt-1 pb-1'],
                'headerOptions' => ['style' => 'border-top:3px solid #ccc'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>