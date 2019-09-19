<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<p>корзина...</p>

<ul uk-accordion>
    <li class="uk-open">
        <a class="uk-accordion-title" href="#">Item 1</a>
        <div class="uk-accordion-content">
            <p>....</p>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title" href="#">Item 2</a>
        <div class="uk-accordion-content">
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
        </div>
    </li>
</ul>
<a href="<?= Url::to('order') ?>">Оформить заказ</a>