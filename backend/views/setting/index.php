<h1>Setting</h1>
<hr class="border">

<p class="m-3"></p>
<div style="margin-left:100px; margin-right:100px;">
<div class="row">
    <div class="col-sm-3 card p-2">
        <div class="row">
            <div class="col-sm-4 text-center">
                <?=\yii\helpers\Html::img('@web/icons/animate/setting-post.gif', ['width' => 45, 'class' => 'shadow'])?>
            </div>
            <div class="col-sm-8 text-left">
                <a href="<?=\yii\helpers\Url::to('index.php?r=position/index')?>">
                <div class="h5"><?= Yii::t('app', 'Position')?></div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 card p-2">
        <div class="row">
            <div class="col-sm-4 text-center">1</div>
            <div class="col-sm-8 text-left">
                <a href="<?=\yii\helpers\Url::to('index.php?r=unit/index')?>">
                <div class="h5 text-shadow"><?= Yii::t('app', 'Unit')?></div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 card p-2">
        <div class="row">
            <div class="col-sm-4 text-center">1</div>
            <div class="col-sm-8 text-left">
                <a href="<?=\yii\helpers\Url::to('index.php?r=post/index')?>">
                <div class="h5"><?= Yii::t('app', 'Post')?></div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 card p-2">
        <div class="row">
            <div class="col-sm-4 text-center">1</div>
            <div class="col-sm-8 text-left">
                <a href="<?=\yii\helpers\Url::to('index.php?r=post/index')?>">
                <div class="h5"><?= Yii::t('app', 'Post')?></div>
            </div>
        </div>
    </div>
</div>

</div>