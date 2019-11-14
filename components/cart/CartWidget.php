<?php
namespace app\components\cart;
use yii\base\Widget;

class CartWidget extends Widget 
{
    public function run() {
        parent::run();
        $qty = 0;
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                $qty += $_SESSION['cart'][$key]['qty'];
            }
        }
        return $this->render('cart', compact('qty'));
    }
}
?>