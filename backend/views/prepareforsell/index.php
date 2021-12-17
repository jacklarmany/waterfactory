<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrepareforsellSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Prepareforsells');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepareforsell-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php
    //  echo GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     // 'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         'id',
    //         'waterid',
    //         'quality',
    //         'sellprice',
    //         'discount',
    //         'customerid',
    //         'factoryid',
    //         'userid',

    //         ['class' => 'yii\grid\ActionColumn'],
    //     ],
    // ]); 
    ?>

    <?php Pjax::end(); ?>

</div>



<?php
$prepareforsellData = \backend\models\Prepareforsellview::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->All();
if (count($prepareforsellData) <= 0) {
?>
    <div class="mt-5 text-center offset-lg-4 col-lg-4 p-3 rounded-circle">
        <h2 class="text-primary">ເປົ່າວ່າງ</h2>
        <!-- <p>
            ກະລຸນາ ກົດປຸ່ມສີຟ້າດ້ານແຈຊ້າຍຂອງໜ້າຈໍ
            ເພື່ອສ້າງຂໍ້ມູນຂອງນໍ້າ ໃຫ້ເກີດຂື້ນໃນໜ້ານີ້.
        </p> -->
    </div>
<?php
} else {
?>
    <div class="p-4 bg-white">
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="text-right mb-2">
            <a href="index.php?r=water" class="btn btn-border video-popup"><span class="lni-list"></span></a>
            <a href="#" class="btn btn-border video-popup" data-toggle="modal" data-target="#exampleModalCenter"><span class="lni-eye"></span></a>
            <a href="<?=\yii\helpers\Url::toRoute(['prepareforsell/printbill'])?>" class="btn btn-border video-popup"><span class="lni-printer"></span></a>
        </p>
        <div class="table table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th><?= Yii::t('app', 'Water name'); ?></th>
                    <th><?= Yii::t('app', 'Quantity'); ?></th>
                    <th><?= Yii::t('app', 'Sell price'); ?></th>
                    <th><?= Yii::t('app', 'Amount'); ?></th>
                    <th><?= Yii::t('app', 'Discount'); ?></th>
                    <th><?= Yii::t('app', 'Amount discount'); ?></th>
                    <th><?= Yii::t('app', 'Amount Receive'); ?></th>
                    <th><?= Yii::t('app', 'Customer'); ?></th>
                    <th><?= Yii::t('app', 'Action'); ?></th>
                </tr>
                <?php
                foreach ($prepareforsellData as $preData1) {
                ?>
                    <tr>
                        <td>
                            <?php
                            $waterName = backend\models\Water::find()->where(['id' => $preData1['waterid'], 'factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
                            foreach ($waterName as $waterName1);
                            echo $waterName1['watername'];
                            ?>
                        </td>
                        <td><?= $preData1['quality'] ?></td>
                        <td><?= number_format($preData1['sellprice']) ?></td>
                        <td><?= number_format($preData1['amount']) ?></td>
                        <td><?= number_format($preData1['discount']) ?> %</td>
                        <td><?= number_format($preData1['amountdiscount']) ?></td>
                        <td><?= number_format($preData1['amount'] - $preData1['amountdiscount']) ?></td>
                        <td>
                            <?php if ($preData1['customerid'] == null) {
                                echo "----";
                            } else {
                                $customerName = \backend\models\Customer::find()->where(['id' => $preData1['customerid'], 'factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
                                foreach ($customerName as $customerNames);
                                echo $customerNames['fname'] . " " . $customerNames['lname'];
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="index.php?r=prepareforsell/update&id=<?= $preData1['id'] ?>" class="p-1 bg-info rounded text-white">Edit</a>
                            <?php
                            echo Html::a('Delete', ['prepareforsell/delete', 'id' => $preData1['id']], [
                                'class' => 'p-1 bg-danger rounded text-white',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Are you sure to delete this item ?',
                                ]
                            ])
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
<?php
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>