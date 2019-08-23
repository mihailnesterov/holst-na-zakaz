<?php
namespace app\components\posterlistimage;
use yii\base\Widget;
use app\models\Images;
use yii\helpers\Url;

class PosterListImageWidget extends Widget 
{
    public $poster_id = null;
    public function run() {
        $bundle = PosterListImageAsset::register( $this->getView() );
        parent::run();
        if($this->poster_id){
            $image = Images::find()->where(['poster_id' => $this->poster_id])->one();
            return $this->render('image',[
                'url' => Url::to(['poster', 'id' => $this->poster_id]),
                'image' => $image ? 'images/posters/'.$image->src : $bundle->baseUrl.'/img/image.png',
                'alt' => $image ? $image->poster->name : 'Постер №'.$this->poster_id,
            ]);
        }
    }
}
?>