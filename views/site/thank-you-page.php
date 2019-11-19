<?php
/**
 * thank you page
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="uk-width-1-1">
    <div class="uk-margin">
    
        <!--<h1 class="uk-heading-divider uk-heading-bullet uk-margin-medium-bottom">
            <?= Html::encode($this->title) ?>
        </h1>-->

        <div class="uk-box-shadow-medium uk-text-center uk-padding uk-margin-auto-vertical">
            <h1 class="uk-text-center uk-padding-small uk-margin-remove-top">
                <i class="fas fa-check uk-margin-small-right uk-text-success"></i>
                Ваш заказ принят
            </h1>
            <hr class="uk-divider-icon">
            <h3 class="uk-text-center uk-padding-small uk-margin-remove-vertical">
                В ближайшее время наш менеджер свяжется с вами для уточнения деталей заказа
            </h3>
            <hr class="uk-divider-icon">
            <div class="uk-margin">
                <a href="//holst-na-zakaz.ru" class="uk-button uk-button-link uk-margin-right">Перейти на главную</a>
                <a href="<?= Url::home() ?>" class="uk-button uk-button-link">Вернуться в каталог картин</a>
            </div>
        </div>
    </div> 
</div>
