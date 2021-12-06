<?php

use backend\models\Prepareforsell;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Water;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\WaterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Waters');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-6">
        <h1>
            <?php
            // echo Html::encode($this->title) 
            ?>
            
            <?php // echo $this->render('_search', ['model' => $searchModel]) 
            ?>

        </h1>
    </div>
    <div class="col-md-6">
        <p class="text-right">
            <span class="rounded-circle">
                <a href="index.php?r=water/create" class="btn-primary shadow-lg p-4 m-2">
                    <span class="lni-plus"></span>
                    <?php //= Yii::t('app', 'ສ້າງ') 
                    ?>
                </a>
            </span>
            <span class="rounded-circle">
                <a href="index.php?r=water/create" class="btn-primary shadow-lg p-4 mt-2 mb-2">
                    <span class="lni-user"></span>
                    <?php //= Yii::t('app', 'ສ້າງ') 
                    ?>
                </a>
            </span>

            <span class="boxhovr">
                <a href="index.php?r=prepareforsell">
                    <b class="btn-primary p-4 m-2">
                        <span class="lni-cart"> </span>
                        <?php
                        $coundpre = Prepareforsell::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->all();
                        if (count($coundpre) <= 0) {
                            echo "";
                        } else {
                            $count = count($coundpre);
                            echo "<span class='badge badge-light'>" . $count . "</span>";
                        }
                        ?>
                    </b>
                </a>
            </span>
        </p>
    </div>
</div>
<br><br>

<div class="water-index" style="display: none;">
    <?php
    // echo GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         // 'id',
    //         // 'image',
    //         'watername',
    //         'unit',
    //         'quality',
    //         'sellprice',
    //         //'factoryid',
    //         //'userid',

    //         // ['class' => 'yii\grid\ActionColumn'],
    //         [
    //             'class' => 'yii\grid\ActionColumn',
    //             'template' => '{media} {view} {update} {delete}',
    //             'buttons' => [
    //                 'media' => function ($url, $model) {
    //                     return Html::a(
    //                         '<span class="fa fa-paperclip"></span>',
    //                         $url,
    //                         [
    //                             'class' => 'btn-sm  btn-dark btn_crud',
    //                             'title' => Yii::t('app', 'Upload Images, Videos, Doc')
    //                         ]
    //                     );
    //                 },
    //                 'view' => function ($url, $model) {
    //                     return Html::a(
    //                         '<span class="fa fa-eye"></span>',
    //                         $url,
    //                         [
    //                             'class' => 'btn-sm  btn-success btn_crud',
    //                             'title' => Yii::t('app', 'View')
    //                         ]
    //                     );
    //                 },
    //                 'update' => function ($url, $model) {
    //                     return Html::a(
    //                         '<span class="fa fa-edit"></span>',
    //                         $url,
    //                         [
    //                             'class' => 'btn-sm  btn-primary btn_crud',
    //                             'title' => Yii::t('app', 'Edit')
    //                         ]
    //                     );
    //                 },
    //                 'delete' => function ($url, $model) {
    //                     return Html::a(
    //                         '<span class="fa fa-trash-o"></span>',
    //                         $url,
    //                         [
    //                             'data-method' => "post",
    //                             'data-confirm' => Yii::t('app', 'Are you want to delete this item.?'),
    //                             'class' => 'btn-sm btn-danger btn_crud',
    //                             'title' => Yii::t('app', 'Delete')
    //                         ]
    //                     );
    //                 },
    //             ],
    //         ],
    //     ],
    // ]);
    ?>
</div>


<div class="container ml-4">
    <section class="row">
        <?php
        $waterData = Water::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->All();
        if (count($waterData) <= 0) {
        ?>
            <div class="mt-5 text-center offset-lg-4 col-lg-4 p-3 rounded-circle">
                <h2 class="text-primary">ເປົ່າວ່າງ</h2>
                <p>
                    ກະລຸນາ ກົດປຸ່ມສີຟ້າດ້ານແຈຊ້າຍຂອງໜ້າຈໍ
                    ເພື່ອສ້າງຂໍ້ມູນຂອງນໍ້າ ໃຫ້ເກີດຂື້ນໃນໜ້ານີ້.
                </p>
            </div>
        <?php
        }
        foreach ($waterData as $waterData1) {
        ?>

            <div class="m-2 c-center" style="width: 324px;">
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
                        <hr>
                        <p class=" text-right">
                            <a href="index.php?r=prepareforsell/create&waterid=<?= $waterData1['id'] ?>#" data-toggle="tooltip" data-placement="top" tilte="<?= Yii::t('app', 'Sell') ?>" class="m-0 card-link btn-sm btn-primary"><span class="fa fa-shopping-basket"></span></a>
                            <a href="index.php?r=wateradd/create&waterid=<?= $waterData1['id'] ?>#" class="m-0 card-link btn-sm btn-success"><span class="fa fa-plus-circle"></span></a>
                            <a href="index.php?r=water/view&id=<?= $waterData1['id'] ?>#" class="m-0  card-link btn-sm btn-default border"><span class="fa fa-eye"></span></a>
                            <a href="index.php?r=water/update&id=<?= $waterData1['id'] ?>#" class="m-0  card-link btn-sm btn-info"><span class="fa fa-edit"></span></a>
                            <?php
                            echo Html::a(
                                '<span class="fa fa-trash"></span>',
                                ['/water/delete', 'id' => $waterData1['id']],
                                [
                                    'class' => 'card-link btn-sm btn-danger m-0 ',
                                    'title' => Yii::t('app', 'Delete'),
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => Yii::t('app', 'Are you want to delete this item.?'),
                                    ],
                                ]
                            );
                            ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php  } ?>
    </section>
</div>