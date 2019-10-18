<?php
namespace app\modules\admin\components\bagetsmenu;

use Yii;
use yii\base\Widget;
use app\models\Bagets;

class BagetsMenuWidget extends Widget {
    public function run() {
        parent::run();
        $this->view->title = 'Багеты';
        $bagets = Bagets::find()->orderby(['id' => SORT_ASC])->all();
        return $this->render('bagetsmenu', [
            'bagets' => $bagets,
        ]);
    }
}
?>