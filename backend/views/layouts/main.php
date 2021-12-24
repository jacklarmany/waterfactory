<?php
$session = Yii::$app->session;
$session->open();
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\models\Factory;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;
/*
$this->registerCss("
div.required label.control-label:after {
    content: \" *\";
    color: red;
}
");*/

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $this->head() ?>
    <style>
        .boxhover:hover {
            box-shadow: 0 10px 22px 10px rgba(27, 38, 49, 0.1);
        }

        .c-center {
            align-items: center;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <!-- Header Area wrapper Starts -->
    <div id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-md bg-white fixed-top pl-0 pt-1 pb-1 rounded scrolling-navbar" style="border:2px solid #dddfe2">
            <div class="container-fluid">
                <a href="index.php?r=site/#" class="navbar-bran" style="font-size: 21px;">
                    <?php
                    if (isset($_SESSION['factoryid'])) {
                        $nfn = Factory::find()->where(['id' => $_SESSION['factoryid']])->all();
                        foreach ($nfn as $b);
                        if (@$b['factoryname'] != null) {
                            $urlimg = Yii::$app->request->baseUrl;
                            $logo = $b['logo'];
                            echo "<img src='$urlimg/logo/$logo' width='45' class='rounded-circle shadow border'> ".@$b['factoryname'];
                        } else {
                            echo "
                            <script>
                            alert('ເກີດຂໍ້ຜິດພາດ');
                            location ='index.php?r=site';
                            </script>
                            ";
                        }
                    } else {
                        $imgurl = Yii::$app->request->baseUrl;
                        echo "<img src='$imgurl/images/admin.png' style='width: 38px;'>" . Yii::$app->user->identity->username;
                    }
                    ?>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><i class="lni-menu"></i></button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                        <li class="nav-item pl-2">
                            <a class="nav-link" href="<?= Url::toRoute(['language/change', 'lang' => 'lo']) ?>">
                                <img src="<?= Yii::$app->request->baseUrl ?>/icons/laos-25.png" width="25" class="shadow-sm rounded-circle">
                            </a>
                        </li>
                        <li class="nav-item pl-2">
                            <a class="nav-link" href="<?= Url::toRoute(['language/change', 'lang' => 'en']) ?>">
                                <img src="<?= Yii::$app->request->baseUrl ?>/icons/usa-25.png" width="25" class="shadow-sm rounded-circle">
                            </a>
                        </li>
                        <li class="nav-item pl-4">
                            <a class="nav-link" href="#">
                                <img src="<?= Yii::$app->request->baseUrl ?>/icons/bell25.png" width="25" class="shadow-sm">
                            </a>
                        </li>
                        <?php
                        if(isset($_SESSION['factoryid'])){
                        echo "
                            <li class='nav-item pl-2'>
                            <a class='nav-link' href='index.php?r=admin'>
                                <img src='".Yii::$app->request->baseUrl."/icons/user-25.png' class='shadow-sm'>
                            </a>
                        </li>
                        ";
                        }else{
                            echo"";
                        }
                        ?>
                        <li class="nav-item pl-2 pr-3">
                            <a class="nav-link" href="<?= Url::to('index.php?r=setting') ?>">
                                <img src="<?= Yii::$app->request->baseUrl ?>/icons/setting25.png" class="shadow-sm">
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (Yii::$app->user->isGuest) {
                                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                            } else {
                                echo Html::a(
                                    '<img src="' . Yii::$app->request->baseUrl . '/icons/logout30.png" class="shadow rounded">',
                                    ['/site/logout'],
                                    [
                                        'class' => 'nav-link',
                                        'data' => [
                                            'method' => 'post',
                                            'params' => ['derp' => 'herp'],
                                        ],
                                    ]
                                );
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
    </div>
    <br><br>

    <div class="main-menu" style="display:<?php if (@$_SESSION['factoryid'] == null) {
                                                echo "none";
                                            } else {
                                                echo "block";
                                            } ?>">
        <ul>
            <section class="linkstext-strong">
                <li class="menu-item1">
                    <a href="index.php?r=manage/mnf&id=<?= @$_SESSION['factoryid']; ?>#!">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/dashboard-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'Dashboard') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=checkprintedbill#">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/bill-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'Check Printed Bills') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=wateradd#">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/historyadded-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'History of Added') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=watersale#">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/historysale-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'History of Sale') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=water">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/warehousewater-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'Warehouse of Water') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=stuff">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/staff-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'Stuff') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=stuffasuser">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/stuffasuser-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'Staff as User') ?></b>
                    </a>
                </li>
                <li class="menu-item1">
                    <a href="index.php?r=customer">
                        <i class="m-2"><img src="<?= Yii::$app->request->baseUrl ?>/icons/customer-30.png" class="shadow-sm"></i>
                        <b><?= Yii::t('app', 'Customer Info') ?></b>
                    </a>
                </li>
                
            </section>
        </ul>
    </div>

    <?php
    /////////////////////////////////////////////////////////
    /////// CONTEN //////////////////////////////////////////
    /////////////////////////////////////////////////////////
    ?>
    <?php
    if (isset($_SESSION['factoryid'])) {
    ?>
        <div style="margin-left:50px;">
            <main role="main" class="flex-shrink-0">
                <div class="container">
                    <br>
                    <?php echo Breadcrumbs::widget(['class' => ['bg-white'], 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
                    <?php echo Alert::widget() ?>
                    <br>
                    <?php echo $content ?>
                    <br><br>
                </div>
            </main>
        </div>
    <?php
    } else {
    ?>
        <div style="margin-left:0px;">
            <main role="main" class="flex-shrink-0">
                <div class="container">
                    <br><br>
                    <?= $content ?>
                    <br><br>
                </div>
            </main>
        </div>
    <?php
    }
    ?>
    <?php
    /////////////////////////////////////////////////////////
    /////// END CONTEN //////////////////////////////////////
    /////////////////////////////////////////////////////////
    ?>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name)
                                            ?> <?= date('Y')
                                                ?></p>
            <p class="float-right"><?= Yii::powered()
                                    ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
