<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<!-- shopping cart -->
<div id="cart" class="uk-animation-toggle" tabindex="0">
    <?= Html::a(
        '<i class="fa fa-shopping-cart uk-margin-small-right"></i>
        Корзина 
        <span id="cartCount" class="uk-margin-small-left uk-badge uk-animation-scale-up">0</span>
        <span id="cartSum" class="uk-hidden">0.00</span>',
        '#', // empty url
        [ 
            'class' => 'uk-button uk-button-default uk-margin-small-top',
            'uk-tooltip' => 'title: Ваша корзина пуста...; pos: bottom; delay: 400',
        ]
    ) 
    ?>
</div>