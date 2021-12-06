<?php

use backend\models\Customer;
use yii\helpers\Html;
use backend\models\Water;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Prepareforsell */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">
    <section class="shadow rounded p-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <?php
            $waterData = Water::find()->where(['id' => $waterid, 'factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->All();
            foreach ($waterData as $waterData1);
            ?>
            <?php
            ///////////////////////////////////////////////////////////////////
            //// WATER IMAGE DETAIL ///////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ?>
            <div class="m-4" style="width: 328px;">
                <div class="bg-white mb-4 shadow-sm" style="border:1px solid #dddfe2">
                    <img class="card-img-top" src="<?= Yii::$app->request->baseUrl ?>/images/<?= $waterData1['image'] ?>" alt="Card image cap">
                    <div class="card-body boxhover">
                        <h5 class="card-title"><?= $waterData1['watername']; ?></h5>
                        <table width="100%" border="0">
                            <tr>
                                <th>ຍັງເຫຼືອ</th>
                                <td class="text-center"><?= number_format($waterData1['quality']) ?></td>
                                <td class="text-center"><?= $waterData1['unit'] ?></td>
                            </tr>
                            <tr>
                                <th>ລາຄາຂາຍ</th>
                                <td class="text-center"><?= number_format($waterData1['sellprice']) ?></td>
                                <td class="text-center"><?= Yii::t('app', 'Kip') ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            ///////////////////////////////////////////////////////////////////
            //// FORM PREPARE FOR SELL ////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ?>
            <div class="m-4 col-md-7" style="width: 645px;">
                <div class="prepareforsell-form">
                    <?php $form = ActiveForm::begin();?>
                    <table width="100%" border="0">
                        <tr>
                            <td colspan="3">
                                <?php
                                echo $form->field($model, 'id')
                                    ->dropDownList(
                                        ArrayHelper::map(Customer::find()->asArray()->all(), 'id', 'fname'),
                                        [
                                            'prompt' => 'Select Option',
                                            'style' => 'height:43px',
                                        ]
                                    )->label(false)
                                ?>
                                <?php
                                //echo $form->field($model, 'id')->dropDownList(['1' => 'Yes', '0' => 'No'], ['prompt' => 'Select Option', 'class' => ' border btn btn-block text-dark rounded text-left bg-white']);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <?= $form->field($model, 'quality')->textInput(['autofocus' => true, 'type' => 'number', 'placeholder' => Yii::t('app','Quantites'), 'style' => 'height:43px'])->label(false) ?>
                            </td>
                            <td>ຫົວໜ່ວຍ</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <?php echo $form->field($model, 'discount')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Discount _____ %'),  'style' => 'height:43px'])->label(false) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <div class="form-group">
                                    <?= Html::submitButton('<span class"fa fa-cart"></span>' . Yii::t('app', 'Add to prepare for sell'), ['class' => 'btn btn-primary','style' => 'height:45px;']) ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <hr>
    <hr>

    <?php
    $prepareforsellData = \backend\models\Prepareforsellview::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->All();
    if (count($prepareforsellData) <= 0) {
        echo "";
    } else {
    ?>
        <section class=" p-4 bg-white">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="table table-responsive">
                <p class="text-right mb-2">
                    <a href="index.php?r=water" class="btn btn-border video-popup"><span class="lni-list"></span></a>
                    <a href="#" class="btn btn-border video-popup" data-toggle="modal" data-target="#exampleModalCenter"><span class="lni-eye"></span></a>
                    <a href="#" class="btn btn-border video-popup"><span class="lni-printer"></span></a>
                </p>
                <table width="100%">
                    <tr>
                        <th><?= Yii::t('app', 'Water name'); ?></th>
                        <th><?= Yii::t('app', 'Quantity'); ?></th>
                        <th><?= Yii::t('app', 'Sell price'); ?></th>
                        <th><?= Yii::t('app', 'Amount'); ?></th>
                        <th><?= Yii::t('app', 'Discount'); ?></th>
                        <th><?= Yii::t('app', 'Amount discount'); ?></th>
                        <th><?= Yii::t('app', 'Amount Receive'); ?></th>
                        <th><?= Yii::t('app', 'Customer ID'); ?></th>
                        <th><?= Yii::t('app', 'Action'); ?></th>
                    </tr>
                    <?php
                    foreach ($prepareforsellData as $preData1) {
                    ?>
                        <tr style="border-bottom:1px solid #f0f0f0">
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
                            <td><?= $preData1['customerid'] ?></td>
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
        </section>

    <?php
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
        <div class="modal-content" style="border: 1px solid #999; box-shadow: 2px 50px 100px #fff">
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
<br><br><br><br>