<?php 
namespace app\modules\admin\components\posterscatalogmenu;

use Yii;
use yii\base\Widget;
use app\models\Catalog;
use app\models\CatalogPosters;

class PostersCatalogMenuWidget extends Widget
{
    public function run() {
        parent::run();
        $catalog = CatalogPosters::find()->distinct()->select('catalog_id')->orderby(['catalog_id'=>SORT_ASC])->all();
        return $this->render('menu',[
            'catalog' => $catalog
        ]);
    }
}

?>