<?php

use backend\models\Factory;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <p class="text-right">
        <a href="index.php?r=site/index&data=column">show column</a>
        <a href="index.php?r=site/index&data=row">show row</a>
    </p>
    <div class="jumbotron text-center bg-transparent">
        <p><a class="btn btn-lg shadow-sm rounded btn-success rounded-0" href="index.php?r=factory/create"><img src="<?= Yii::$app->request->baseUrl ?>/icons/add-100.png" width="50"> <br>ສ້າງໂຮງງານ</a></p>
    </div>

    <div class="body-content">
        <div class="row">
            <?php
            $factoryData = Factory::find()->where(['userid' => Yii::$app->user->id])->all();
            foreach ($factoryData as $factoryData1) {
            ?>
                <div class="col-lg-4">
                    <div class="services-item wow fadeInRight bg-white" data-wow-delay="0.6s">
                        <div class="icon mb-2">
                            <i class="lni-home"></i>
                        </div>
                        <div class="services-content">
                            <h5><a href="#"><?php echo $factoryData1['factoryname']; ?> </a></h5>
                            <p>Donec tincidunt bibendum gravida. </p>
                            <p class="text-center mt-2">
                                <a class="btn btn-border video-popup" href="index.php?r=factory/view&id=<?php echo $factoryData1['id'] ?>#">Settings &raquo;</a>
                                <a class="btn btn-border video-popup" href="index.php?r=manage/mnf&id=<?php echo $factoryData1['id'] ?>#">Manage &raquo;</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>

<br><br><br>