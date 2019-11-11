<?php
use yii\helpers\Url;
?>
<!-- search form -->
<form action="<?= Url::to('search') ?>" method="GET" class="uk-margin-small-bottom">
    <div class="uk-inline uk-width-1-1 uk-margin-small-top">
        <button class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></button>
        <input id="q" name="q" class="uk-input uk-form-default" type="text" placeholder="Поиск по каталогу">
    </div>
</form>