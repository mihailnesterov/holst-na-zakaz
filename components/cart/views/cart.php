<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<!-- shopping cart -->
<div id="cart">
    <?= Html::a(
        '<i class="fa fa-shopping-cart uk-margin-small-right"></i>
        Корзина 
        <span id="cartCount" class="uk-margin-small-left uk-badge">0</span>
        <span id="cartSum" class="uk-hidden">0.00</span>',
        Url::to('cart'),
        [ 'class' => 'uk-button uk-button-default uk-margin-small-top' ]
    ) 
    ?>
</div>