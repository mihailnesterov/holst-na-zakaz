<?php
namespace app\modules\admin\components\categorymenu;

use Yii;
use yii\base\Widget;
use app\models\Catalog;

class CategoryMenuWidget extends Widget {
    public function run() {
        parent::run();
        $this->view->title = 'Категории';
        $catalog = Catalog::find()->orderby(['id' => SORT_ASC])->all();
        return $this->render('categorymenu', [
            'catalog' => $catalog,
        ]);
    }
}
?>