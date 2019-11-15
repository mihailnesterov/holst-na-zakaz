<?php
namespace app\components\posterlistimage;
use yii\base\Widget;
use app\models\Posters;

class PosterListImageWidget extends Widget 
{
    public $poster_id = null;
    public $img_class = null;
    public function run() {
        $bundle = PosterListImageAsset::register( $this->getView() );
        parent::run();
        if($this->poster_id){
            $poster = \Yii::$app->cache->getOrSet('poster', function () {
                return Posters::findOne(['id' => $this->poster_id]);
            }, 3600);
            return $this->render('image',[
                'image' => $poster ? 'images/posters/'.$poster->image : $bundle->baseUrl.'/img/image.png',
                'alt' => $poster ? $poster->name : 'Постер №'.$this->poster_id,
                'img_class' => $this->img_class ? $this->img_class : null
            ]);
        }
    }
}
?>