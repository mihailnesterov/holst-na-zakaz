<?php
use app\components\search\SearchWidget;
use app\components\cart\CartWidget;
use app\components\posterlist\PosterListWidget;
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
<?php echo PosterListWidget::widget(['search' => \Yii::$app->request->get('q')]); ?>

