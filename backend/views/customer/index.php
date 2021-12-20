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
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //echo Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) 
        ?>
        <?php echo Html::button('Create Customer', ['value' => Url::to('index.php?r=customer/create'), 'id' => 'modalButton', 'class' => 'btn btn-success']) ?>
        <?php //echo Html::button('Create Customer', ['id' => 'modalButton', 'value' => Url::to('index.php?r=customer/create'), 'class' => 'btn btn-success']) 
        ?>
    </p>



    <?php
    // Modal::begin([
    //     'header' => 'Create Customer',
    //     'size' => 'modal-lg',
    //     'id' => 'modal',
    // ]);

    // echo "<div id='modalContent'></div>";

    // Modal::end();
    ?>



    <dvi class="table table-responsive">
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
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

                ['class' => 'yii\grid\ActionColumn'],
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