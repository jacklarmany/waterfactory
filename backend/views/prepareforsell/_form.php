<?php

use backend\models\Customer;
use yii\helpers\Html;
use backend\models\Water;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Prepareforsell */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <section class="shadow rounded pr-4 pl-4 pt-2">
                <p class="col-sm-12 text-right">
                    <a href="#"><img src="<?= Yii::$app->request->baseUrl?>/icons/substract20.png"></a>
                    <a href="#"><img src="<?= Yii::$app->request->baseUrl?>/icons/togle-fullscreen20.png" width="20"></a>
                    <a href="<?= Url::to('index.php?r=water')?>"><img src="<?= Yii::$app->request->baseUrl?>/icons/close20.png"></a>
                </p>
                <?= Html::encode($this->title) ?>
                <hr class="border-dark">
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
                    <div class="col-md-5">
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
                    <div class="col-md-7">
                        <div class="prepareforsell-form">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <table width="100%" border="0">
                                        <tr>
                                            <td colspan="3">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <?php
                                                        // echo $form->field($model, "customerid")
                                                        //     ->dropDownList(
                                                        //         ArrayHelper::map(Customer::find()->asArray()->all(), "id", "fname"),
                                                        //         [
                                                        //             "prompt" => "Select Option",
                                                        //             "onchange" => "
                                                        //                 $.post('index.php?r=prepareforsell/calculate&id=" . "' +$(this).val(), function(data){
                                                        //                     console.log();
                                                        //                     $('#discounts').val(data);
                                                        //                 });
                                                        //             ",
                                                        //             "style" => "height:43px",
                                                        //         ]
                                                        //     )->label(false);

                                                        // Usage with ActiveForm and model
                                                        echo $form->field($model, 'customerid')->widget(Select2::classname(), [
                                                            'data' => \yii\helpers\ArrayHelper::map(Customer::find()->all(), 'id', ['fname']),
                                                            'options' => ['placeholder' => Yii::t('app', 'Select a state ...')],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ])->label(Yii::t('app', 'Select customer'));
                                                        ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input size="20" placeholder="<?= Yii::t('app', 'Discount - - - %') ?>" id="discounts" class="form-control mb-3 bg-white" disabled style="height: 33px;">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <?= $form->field($model, 'quality')->textInput(['autofocus' => true, 'type' => 'number', 'placeholder' => Yii::t('app', 'Quantites'), 'style' => 'height:33px'])->label(false) ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input size="20" id="discounts" class="form-control mb-3 bg-white" disabled style="height: 33px;">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input size="20" id="discounts" class="form-control mb-3 bg-white" disabled style="height: 33px;">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">

                                            </td>
                                        </tr>
                                    </table>
                                    <hr class="border-dark">
                                    <div class="form-group text-right">
                                        <?= Html::submitButton('<span class"fa fa-cart"></span>' . Yii::t('app', 'Add to prepare for sell'), ['class' => 'btn btn-primary', 'style' => 'height:39px;']) ?>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-sm-1"></div>
    </div>
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
                    <a href="<?=Url::toRoute(['prepareforsell/printbill'])?>" class="btn btn-border video-popup"><span class="lni-printer"></span></a>
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
                        <th><?= Yii::t('app', 'Customer'); ?></th>
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
        </section>

    <?php
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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