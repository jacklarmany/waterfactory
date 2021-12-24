<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index bg-white p-4 rounded">

    <h1 class="h2">
        <?= Html::img('@web/icons/customer-30.png', ['class' => 'img-responsive']); ?>
        <?= Html::encode($this->title) ?>
    </h1>
<div class="row">
    <div class="col col-sm-3 text-right p-0 m-0"></div>
    <div class="col col-sm-5 text-right p-0 m-0">
    <?php echo $this->render('_search', ['model' => $searchModel])?>
    </div>
    <div class="col col-sm-4">
    <p class="text-right mb-1">
        <?php //echo Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) 
        ?>
        <?php //echo Html::button('Create Customer', ['value' => Url::to('index.php?r=customer/create'), 'id' => 'modalButton', 'class' => 'btn btn-success']) 
        ?>
        <?php //echo Html::a('<span class="fa fa-plus"></span> '.Yii::t('app', 'Create Customer'), ['create'], ['class' => 'btn btn-success']) 
        ?>
        <a href="#" class="rounded btn pt-2 pb-2 btn-info border" id="btn-search"><span class="fa fa-search"></span> <?= Yii::t('app', 'Search')?></a>
        <?php echo Html::a('<span class="fa fa-plus"></span> ' . Yii::t('app', 'Create Customer'), ['create'], ['class' => 'rounded btn pt-2 pb-2 btn-success']) ?>
    </p>
</div>
</div>

    <dvi class="table table-responsive">
        <?php Pjax::begin(); ?>
        <?php //echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'fullname',
                // 'dob',
                'gender',
                // 'cardid',
                'tel',
                // 'village',
                // 'district',
                // 'province',
                //'factoryid',
                //'userid',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['class' => 'text-right pt-1 pb-1'],
                    'headerOptions' => ['style' => 'border-top:3px solid #ccc'],
                    'template' => '{view} {update} {delete}',
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
                        'update' => function ($url, $model) {
                            return Html::a(
                                '<span class="fa fa-pencil"></span>',
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
        <?php Pjax::end(); ?>

</div>


<!-- Modal -->
<div class="modal fade" id="modalCustomer">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">
                ...
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>