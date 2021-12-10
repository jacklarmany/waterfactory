<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'custom/css/main.css',
        'custom/css/sidebar.css',
        'custom/css/animate.css',
        'custom/fonts/line-icons.css',
        'custom/css/responsive.css',
        'custom/css/nivo-lightbox.css',
        'custom/css/owl.carousel.min.css',
        'custom/fonts/line-icons.css',
    ];
    public $js = [
        'custom/js/customjs.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
