<?php
namespace app\components\posterlistimage;
use yii\web\AssetBundle;

class PosterListImageAsset extends AssetBundle 
{
    public function init() {
        $this->sourcePath = realpath( __DIR__.'/assets' );
        //$this->baseUrl = '@web';    // не обязательно, default = @web
    }
}
?>