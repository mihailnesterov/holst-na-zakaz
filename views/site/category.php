<?php

use yii\helpers\Html;
use app\components\posterlist\PosterListWidget;

$baseurl = Yii::$app->request->baseUrl;

// meta tags
$this->title = 'Картины / '.$category->name.' ('.$postsCount.')';
$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $category->keywords
]);
$this->registerMetaTag([
	'name' => 'description',
	'content' => $category->name.' - картины, постеры заказать в Москве. '.substr($category->description,0,200)
]);

?>

<!-- search form -->
<div class="uk-background-muted uk-padding-small uk-panel uk-margin-bottom">
	<form action="" method="POST" class="uk-margin-small-bottom">
		<div class="uk-inline uk-width-1-1 uk-margin-small-top">
			<button class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></button>
			<input class="uk-input uk-form-default" type="text" placeholder="Поиск по каталогу">
		</div>
	</form>
</div>

<!-- posters list -->
<?php echo PosterListWidget::widget(['id' => $id]); ?>
