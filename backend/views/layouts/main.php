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
        <nav class="navbar navbar-expand-md bg-white fixed-top rounded scrolling-navbar" style="border:2px solid #dddfe2">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- <a href="index.php?r=manage/mnf&id=<? //= $_SESSION['factoryid']
                                                        ?>" class="navbar-brand"><img src="/images/logo.png" alt=""> -->
                <a href="index.php?r=site/#" class="navbar-brand">
                    <?php
                    if (isset($_SESSION['factoryid'])) {
                        $nfn = Factory::find()->where(['id' => $_SESSION['factoryid']])->all();
                        foreach ($nfn as $b);
                        if (@$b['factoryname'] != null) {
                            echo @$b['factoryname'];
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
                        echo "<img src='$imgurl/images/admin.png' style='width: 38px;'>";// . Yii::$app->user->identity->username;
                    }
                    ?>


                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                        <li class="nav-item active">
                            <a class="nav-link" href="#hero-area">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#team">
                                Team
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">
                                Pricing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonial">
                                Testimonial
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (Yii::$app->user->isGuest) {
                                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                            } else {
                                echo Html::a(
                                    'logout',
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
            <section class="hme">
                <li class="menu-item1"><a href="index.php?r=manage/mnf&id=<?= @$_SESSION['factoryid']; ?>#"><i class="fa fa-home"></i>Home</li></a>
                <li class="menu-item1"><a href="index.php?r=wateradd#"><i class="fa fa-bell"></i>History of added</li></a>
                <li class="menu-item1"><a href="index.php?r=watersell#"><i class="fa fa-paper-plane"></i>History of sale</li></a>
                <li class="menu-item1"><a href="index.php?r=water"><i class="fa fa-globe"></i>Warehouse of water</li></a>
                <li class="menu-item1"><a href="index.php?r=stuff"><i class="fa fa-users"></i>Stuff</li></a>
                <li class="menu-item1"><a href="index.php?r=stuffasuser"><i class="fa fa-user"></i> Stuff as user</li></a>
            </section>
            <section class="links">
                <li class="menu-item1"><a href="index.php?r=customer"><i class="fa fa-gamepad"></i>Customer</li></a>
                <li class="menu-item1"><i class="fa fa-code"></i>Programming</li>
                <li class="menu-item1"><i class="fa fa-gears"></i>Technology</li>
                <li class="menu-item1"><i class="fa fa-hashtag"></i>Mathematics</li>
                <li class="menu-item1"><i class="fa fa-wrench"></i>Physics</li>
                <li class="menu-item1"><i class="fa fa-globe"></i>Web Development</li>
                <li class="menu-item1"><i class="fa fa-android"></i>Android Development</li>
            </section>
            <section class="social">
                <li class="menu-item1"><i class="fa fa-facebook"></i>Facebook</li>
                <li class="menu-item1"><i class="fa fa-twitter"></i>Twitter</li>
                <li class="menu-item1"><i class="fa fa-github"></i>Github</li>
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
                    <?php echo Breadcrumbs::widget(['class'=>['bg-white'], 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
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

    <!-- <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <? //= Html::encode(Yii::$app->name) 
                                            ?> <? //= date('Y') 
                                                ?></p>
            <p class="float-right"><? //= Yii::powered() 
                                    ?></p>
        </div>
    </footer> -->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
