<?php 
namespace app\components\catalogmenu;

use Yii;
use yii\base\Widget;
use app\models\Catalog;
use app\models\CatalogPosters;

class CatalogMenuWidget extends Widget
{
    public function run() {
        parent::run();
        $catalog = Yii::$app->cache->getOrSet('catalog_menu', function () {
            return CatalogPosters::find()->distinct()->select('catalog_id')->orderby(['catalog_id'=>SORT_ASC])->all();
        }, 3600);
        return $this->render('catalogmenu',[
            'catalog' => $catalog
        ]);
    }
}

?>