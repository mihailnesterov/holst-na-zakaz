<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<p>оформление заказа...</p>

<form>
    <fieldset class="uk-fieldset">

        <legend class="uk-legend">Legend</legend>

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Ваше имя">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Телефон">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Email">
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Адрес доставки">
        </div>

        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-checkbox" type="checkbox" checked> Согласен с <a href="#">политикой конфиденциальности</a></label>
        </div>


    </fieldset>
</form>

<a href="<?= Url::to('thank-you-page') ?>">Заказать</a>