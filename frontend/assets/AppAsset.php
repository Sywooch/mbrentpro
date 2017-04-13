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
        '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'css/style.css',
        'css/bootstrap.css',
        'css/bootcomplete.css',
        'css/font-awesome.css',
        'css/swiper.min.css',
        'css/owl.carousel.css',
        'css/aos.css',
        'https://fonts.googleapis.com/css?family=Roboto',
        //'css/site.css',
        //'css/swiper.css',
        //'css/swiper.min-old.css',
        'css/bootstrap-multiselect.css',
    ];
    public $js = [
        'js/jquery-1.12.4.js',
        'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
        'js/bootstrap.js',
        'js/swiper.min.js',
        'js/owl.carousel.js',
        'js/aos.js',
        'js/bootstrap-multiselect.js',
        //'js/jquery.mockjax.js',
        //'js/jquery.autocomplete.js',
        //'js/countries.js',
        //'js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
