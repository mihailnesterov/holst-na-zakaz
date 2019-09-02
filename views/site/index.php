<?php

use yii\helpers\Html;
use app\components\posterlist\PosterListWidget;

$baseurl = Yii::$app->request->baseUrl;

?>

<!-- search form -->
<div class="uk-background-muted uk-padding-small uk-panel uk-margin-bottom">
	<form action="" method="POST" class="uk-margin-small-bottom">
		<div class="uk-inline uk-width-1-1 uk-margin-small-top">
			<button class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></button>
			<input class="uk-input uk-form-default" type="text" placeholder="Поиск по каталогу">
		</div>
	</form>
	<h1 class="uk-hidden uk-text-large uk-margin-remove uk-margin-small-top"><?= $this->title ?></h1>
</div>

<!-- posters list -->
<?php echo PosterListWidget::widget(); ?>
