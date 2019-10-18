<?php
namespace app\modules\admin\components\servicesmenu;

use Yii;
use yii\base\Widget;
use app\models\AddServices;

class ServicesMenuWidget extends Widget {
    public function run() {
        parent::run();
        $this->view->title = 'Доп. услуги';
        $services = AddServices::find()->orderby(['id' => SORT_ASC])->all();
        return $this->render('servicesmenu', [
            'services' => $services,
        ]);
    }
}
?>