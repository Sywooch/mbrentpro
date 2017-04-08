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
        'jquery-1.12.4.js',
        'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
        'js/bootstrap.js',
        //'js/npm.js',
        'js/swiper.min.js',
        'js/owl.carousel.js',
        'js/aos.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
