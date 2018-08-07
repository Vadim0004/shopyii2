<?php 

namespace frontend\assets;

use yii\web\AssetBundle;

class MyShopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',
        'css/jcarousel.basic.css',
    ];
    
    public $js = [
        // Слайдер
        'js/jquery.cycle2.min.js',
        // Главное
        'js/jquery.jcarousel.min.js',
        'js/jcarousel.basic.js',
        'js/jquery.cycle2.carousel.min.js',
        'js/bootstrap.min.js',
        'js/jquery.scrollUp.min.js',
        'js/price-range.js',
        'js/jquery.prettyPhoto.js',
        'js/main.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}