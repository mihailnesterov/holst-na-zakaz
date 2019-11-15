<?php
namespace app\components\posterlistimage;
use yii\base\Widget;
//use app\models\Images;
use app\models\Posters;
use yii\helpers\Url;

class PosterListImageWidget extends Widget 
{
    public $poster_id = null;
    public $img_class = null;
    public function run() {
        $bundle = PosterListImageAsset::register( $this->getView() );
        parent::run();
        if($this->poster_id){
            //$image = Images::find()->where(['poster_id' => $this->poster_id])->one();
            $poster = \Yii::$app->cache->getOrSet('poster', function () {
                return Posters::findOne(['id' => $this->poster_id]);
            }, 3600);
            //$poster = Posters::findOne(['id' => $this->poster_id]);
            return $this->render('image',[
                //'image' => $image ? 'images/posters/'.$image->src : $bundle->baseUrl.'/img/image.png',
                'image' => $poster ? 'images/posters/'.$poster->image : $bundle->baseUrl.'/img/image.png',
                'alt' => $poster ? $poster->name : 'Постер №'.$this->poster_id,
                'img_class' => $this->img_class ? $this->img_class : null
            ]);
        }
    }
}
?>