<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Admin module asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fontawesome.min.css',
        'css/style.min.css',
        'css/custom.css',
        'css/admin.css',
    ];
    public $js = [
        'js/fontawesome.min.js',
        'js/script.min.js',//vue
        'js/admin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}
