<?php 
namespace app\components\catalogmenu;

use Yii;
use yii\base\Widget;
use app\models\Catalog;

class CatalogMenuWidget extends Widget
{
    public function run() {
        parent::run();
        $catalog = Catalog::find()->orderby(['id'=>SORT_ASC])->all();
        return $this->render('catalogmenu',[
            'catalog' => $catalog
        ]);
    }
}

?>