<?php
namespace app\components\search;
use yii\base\Widget;

class SearchWidget extends Widget 
{
    public function run() {
        parent::run();
        return $this->render('search');
    }
}
?>