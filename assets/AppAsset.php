<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fontawesome.min.css',
        'css/style.min.css',
        'css/custom.css',
        'css/catalog.css',
        
    ];
    public $js = [
        //'https://kit.fontawesome.com/e10db19f3d.js',
        'js/fontawesome.min.js',
        'js/script.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];
}
