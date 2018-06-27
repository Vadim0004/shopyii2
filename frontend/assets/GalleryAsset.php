<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * Description of GalleryAsset
 *
 * @author admin
 */
class GalleryAsset extends AssetBundle
{
    public $css = [
        'frontend/web/css/gallery/style.css',
    ];
    
    public $js = [
        'js/isotope/jquery.isotope.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',  
    ];
    
    public $jsOptions = [
        'position' => View::POS_END,
    ];
}
