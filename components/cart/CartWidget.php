<?php
namespace app\components\cart;
use yii\base\Widget;

class CartWidget extends Widget 
{
    public function run() {
        parent::run();
        return $this->render('cart');
    }
}
?>