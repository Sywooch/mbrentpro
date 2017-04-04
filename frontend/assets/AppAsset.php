<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/aos.css',
        'css/bootstrap.css',
        'css/font-awesome.css',
        'css/owl.carousel.css',
        //'css/site.css',
        'css/style.css',
        'css/swiper.css',
        'css/swiper.min-old.css',
        'css/swiper.min.css',
    ];
    public $js = [
        'js/aos.js',
        'js/bootstrap.js',
        'js/npm.js',
        'js/owl.carousel.js',
        'js/swiper.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
