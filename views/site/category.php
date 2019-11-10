<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\search\SearchWidget;
use app\components\cart\CartWidget;
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

<!-- search form + shopping cart -->
<div class="uk-background-muted uk-padding-small uk-panel uk-margin-bottom">
	<div uk-grid>
		<div class="uk-width-3-4@m">
			<?php echo SearchWidget::widget(); ?>
		</div>
		<div class="uk-width-expand@m">
			<?php echo CartWidget::widget(); ?>
		</div>
	</div>
</div>
<!-- /. search form + shopping cart -->

<!-- posters list -->
<?php echo PosterListWidget::widget(['id' => $id]); ?>
