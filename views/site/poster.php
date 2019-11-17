<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\search\SearchWidget;
use app\components\cart\CartWidget;
use app\components\posterlistimage\PosterListImageWidget;

$this->title = $poster->name;
$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $poster->name.' '.Yii::$app->name
]);
$this->registerMetaTag([
	'name' => 'description',
	'content' => $poster->text.' '.Yii::$app->name
]);
?>

<div id="poster-app" class="uk-container uk-margin-large-bottom">
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
<div id="cart" style="border: 1px red solid; padding: 10px;">
	<a href="<?= Url::to('cart') ?>">
	{{ cartHeader }} 
	<span id="cartCount">{{ cartCount }}</span>
	<span id="cartSum">{{ cartSum }}</span>
	</a>
</div>
	<ul class="uk-breadcrumb uk-background-muted uk-padding-small uk-text-xsmall">
		<li><a href="<?= Url::home() ?>">Картины</a></li>
		<li><span><?= $poster->name ?></span></li>
	</ul>
	<h1 class="uk-heading-divider uk-margin-medium-bottom">
		<?= Html::encode($this->title) ?> 
		<span class="uk-text-small uk-text-middle" style="color: #cd40dc;">Артикул: <?= $poster->articul ?></span>
		<input type="hidden" id="base-price" name="base-price" value="<?= $poster->price ?>">
	</h1>
    <div class="uk-text-center1" uk-grid>
		<div class="uk-width-1-3@m">
			<div class="uk-card uk-card-default uk-card-body1">	

				<div class="module-order-calc-steps-item active">
					<a @click.prevent="selectActiveTab" href="#" class="module-order-calc-steps-item-title">
						Выберите размер (см)
					</a> 
					<!--<div  class="module-order-calc-steps-item-subtitle">
						30×45
					</div> -->
					<div class="module-order-calc-steps-item-body">
						<?php foreach ($posterSizes as $key => $size): ?>
							<a 
								@click.prevent="selectPosterSize" 
								href="#" 
								class="module-order-calc-sizes-item" 
								data-key="<?= $key ?>" 
								:data-price="Math.ceil((((<?= $size->width ?> / 100 * <?= $size->height ?> / 100) * posterPrices.material)))"
							>
								<?= $size->width ?>×<?= $size->height ?>
							</a>
						<?php endforeach; ?>
						
						<div class="module-order-calc-sizes-step">
							<img id="img-canvas-sizes-woman" src="images/canvas-sizes-woman/1.jpg" alt="30×45">
						</div> 
						<p>Или введите вручную</p> 
						<div uk-grid="" class="uk-grid-small uk-grid">
							<div class="uk-width-1-2 uk-first-column">
								<input type="number" class="uk-input uk-width-1-1">
							</div> 
							<div class="uk-width-1-2">
								<input type="number" class="uk-input uk-width-1-1">
							</div>
						</div>
						<input type="hidden" name="size" value="30×45">
					</div>
				</div>

				<div class="module-order-calc-steps-item active">
					<a href="#" class="module-order-calc-steps-item-title">
						Выберите материал
					</a> 
					<!--<div class="module-order-calc-steps-item-subtitle">
						Холст искусственный
					</div> -->
					<div class="module-order-calc-steps-item-body">
						<?php foreach($posterMaterials as $key => $material): ?>
						<div class="module-order-calc-materials-item">
							<label>
								<?php if($key === 0):?>
									<input @click="selectMaterial" checked='checked' type="radio" name="radio-materials" value="<?= $material->price ?>">&nbsp;
								<?php else: ?>
									<input @click="selectMaterial" type="radio" name="radio-materials"  value="<?= $material->price ?>">&nbsp;
								<?php endif; ?>
								<?= $material->name ?>&nbsp;
								<span class="uk-label">
									<span class="price-material">
										<?= $material->price ?>
									</span> ₽
								</span>
							</label> 
							<a aria-hidden="true" href="#material-info-holst-naturalniy" uk-toggle="" class="module-order-calc-materials-item-help"><span uk-icon="icon: question" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="question"><circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <circle cx="10.44" cy="14.42" r="1.05"></circle> <path fill="none" stroke="#000" stroke-width="1.2" d="M8.17,7.79 C8.17,4.75 12.72,4.73 12.72,7.72 C12.72,8.67 11.81,9.15 11.23,9.75 C10.75,10.24 10.51,10.73 10.45,11.4 C10.44,11.53 10.43,11.64 10.43,11.75"></path></svg></span></a> <div id="material-info-holst-naturalniy" uk-modal="" class="uk-modal"><div class="uk-modal-dialog uk-modal-body"><button type="button" uk-close="" class="uk-modal-close-default uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button> <h2 class="uk-modal-title">Холст натуральный</h2> <div><p>Натуральный холст придает картине особенного аристократизма и элегантности. Любое изображение, нанесенное на фактурную поверхность такого холста, выглядит солидно и изысканно.</p> <p>Оптимальная зернистость поверхности холста гарантирует отображение малейших штрихов, передачу едва уловимых оттенков. Это премиум материал, который эффектно смотрится в интерьере и создает иллюзию настоящего рукотворного произведения искусства.</p><p><img data-src="/img/desc/holst-naturalniy.jpg" class="lazyload"></p></div></div></div>
						</div>
						<?php endforeach; ?>
					</div>	
				</div>

				<div class="module-order-calc-steps-item active">
					<a href="#" class="module-order-calc-steps-item-title">
						Толщина подрамника
					</a>
					<div class="module-order-calc-steps-item-subtitle">
						Ретушь фотографии
					</div> 
					<div class="module-order-calc-steps-item-body">
						
						<?php foreach($bagetsWidth as $key => $width): ?>
						<div class="module-order-calc-gifts-item"><label>
							<?php if($key === 0):?>
								<input checked='checked' type="radio" name="radio-bagets-width" value="550">&nbsp;
							<?php else: ?>
								<input type="radio" name="radio-bagets-width" value="550">&nbsp;
							<?php endif; ?>
								<?= $width->width ?> см
							</label>
						</div>
						<?php endforeach;?>
						
						<input type="hidden" name="gift" value="Ретушь фотографии">
					</div>
				</div>

				<div class="module-order-calc-steps-item active">
					<a href="#" class="module-order-calc-steps-item-title">
						Дополнительные услуги
					</a> 
					<!--<div class="module-order-calc-steps-item-subtitle">
						Покрытие лаком, Покрытие 3D гелем
					</div> -->
					<?php foreach ($postersAddServices as $service): ?>
					<div class="module-order-calc-steps-item-body">
						<div class="module-order-calc-addons-item">
							<label>
								<input @click="selectAddService" type="checkbox" class="checkbox-add-service" value="<?= $service->price ?>">&nbsp;
								<?= $service->name ?>
								<span class="uk-label">
									<?= $service->price ?> ₽
								</span>
							</label> 
							<a aria-hidden="true" href="#addon-info-pokritie-lakom" uk-toggle="" class="module-order-calc-addons-item-help"><span uk-icon="icon: question" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="question"><circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <circle cx="10.44" cy="14.42" r="1.05"></circle> <path fill="none" stroke="#000" stroke-width="1.2" d="M8.17,7.79 C8.17,4.75 12.72,4.73 12.72,7.72 C12.72,8.67 11.81,9.15 11.23,9.75 C10.75,10.24 10.51,10.73 10.45,11.4 C10.44,11.53 10.43,11.64 10.43,11.75"></path></svg></span></a> 
							<!-- modal -->
							<div id="addon-info-pokritie-lakom" uk-modal="" class="uk-modal">
								<div class="uk-modal-dialog uk-modal-body">
									<button type="button" uk-close="" class="uk-modal-close-default uk-close uk-icon">
										<svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon">
											<line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line>
											<line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line>
										</svg>
									</button> 
									<h2 class="uk-modal-title">Покрытие лаком</h2> 
									<div>
										<p>Покрытие лаком зашивает картину от всевозможных механических повреждений.</p>
										<p>После покрытия лаком картина приобретает благородный блеск и ее можно протирать влажной тканью.</p>
										<p><img class="lazyload" data-src="/img/desc/lak.jpg" alt=""></p>
									</div>
								</div>
							</div>
							<!--./ end modal -->
						</div>
					</div>
					<?php endforeach; ?>
					<input type="hidden" name="addons" value="Покрытие лаком, Покрытие 3D гелем">
				</div>

				<div class="module-order-calc-steps-item -inactive active">
					<a href="#" class="module-order-calc-steps-item-title">
						Багет
					</a> 
					<div class="module-order-calc-steps-item-body">
						<div class="module-order-calc-addons-item">
						<label>
						<input @click="toggleBaguettes" type="checkbox" value="">&nbsp;
							Добавить багетную раму
						</label> 
						</div>
					</div>
				</div>

				<div style="border: 1px red solid; padding: 5px; margin-top: 10px;">
					<p>Базовая цена = <span id="price-base"><?= $poster->price ?></span></p>
					<p>
						{{posterPrices.base}} + 
						{{posterPrices.size}} + 
						{{posterPrices.services}} +
						{{posterPrices.baguette}} +
						{{fixPrices.holder}} +
						{{fixPrices.margin}} +
						{{fixPrices.podramnik}} +
						{{fixPrices.bagetWork}} +
						{{fixPrices.promoCode}}
					</p>
					<p>Итого = <span id="price-total">{{ getTotalPrice }}</span></p>
					<button @click="buy">Купить</button>
				</div>
				
			</div>
		</div>
		<div class="uk-width-expand@m">
			<div class="uk-card uk-card-default uk-card-body">
				<?php if($poster->autor !== ''): ?>
				<h5 class="uk-text-small uk-margin-remove-top">Автор: <a href="<?= Url::to(['/search','q' => $poster->autor]) ?>" style="color: rgb(205, 64, 220);"><?= $poster->autor ?></a></h5>
				<?php endif;?>
				<?php echo PosterListImageWidget::widget([ 
					'poster_id' => $poster->id, 
					'img_class' => 'poster-image' ]);
				?>
				
				<!-- poster images slider -->
				<div style="border: 1px #eee solid; padding: 10px;" uk-slider="" class="module-order-calc-packages --uk-visible@m uk-slider uk-slider-container">
					<!--<div class="uk-h4 module-order-calc-packages-title">
                        Подарочная упаковка
					</div> -->
					<div class="uk-position-relative uk-visible-toggle">
						<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid" style="transform: translateX(0px);">
							<?php foreach ($images as $image): ?>
							<li class="module-order-calc-packages-item uk-active" style="order: -1;">
								<div uk-lightbox="">
									<a href="images/posters/<?= $image->src ?>">
										<picture>
											<!--<source type="image/webp" srcset="/img/gift-packages/gift-package-1.webp"> 
											<source type="image/jpeg" srcset="/img/gift-packages/gift-package-1.jpg"> 
											<img src="/img/gift-packages/gift-package-1.jpg" alt="1">-->
											<img  data-src="images/posters/<?= $image->src ?>" alt="<?= $image->src ?>" width="100%" style="object-fit:cover;height:80px;" uk-img>
										</picture>
									</a>
								</div> 
								<!--<label>
									<input type="radio" value="1"> Выбрать
								</label>-->
							</li>
							<?php endforeach; ?>
						</ul> 
						<a href="#" uk-slidenav-previous="" uk-slider-item="previous" class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-previous uk-icon uk-slidenav">
							<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous">
								<polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline>
							</svg>
						</a> 
						<a href="#" uk-slidenav-next="" uk-slider-item="next" class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-next uk-icon uk-slidenav">
							<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next">
								<polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline>
							</svg>
						</a>
					</div> 
					<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
						<li uk-slider-item="0" class="uk-active">
							<a href="#"></a>
						</li>
						<!--<li uk-slider-item="1" class=""><a href="#"></a></li>
						<li uk-slider-item="2"><a href="#"></a></li>-->
					</ul> 
					<input type="hidden" name="baguette" value="">
				</div>	<!-- ./ end poster images slider -->
				
				<!-- bagettes slider -->
				<div v-if="isBaguettesSelected" uk-slider="" class="module-order-calc-baguettes --uk-visible@m uk-slider uk-slider-container">
					<div class="uk-h4 module-order-calc-baguettes-title">
                        Выберите багетную раму
					</div> 
					<div class="uk-position-relative uk-visible-toggle">
						<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid" style="transform: translateX(0px);">
							<?php foreach ($bagets as $baget): ?>
							<li class="module-order-calc-baguettes-item uk-active">
								<a @click.prevent="selectBaguette" href="#">
									<div class="module-order-calc-baguettes-item-image">
										<img src="images/baguettes/<?= $baget->image ?>" alt="<?= $baget->material ?> <?= $baget->color ?>">
									</div>
								</a> 
								<label>
									<input @click="selectBaguette" type="radio" name="radio-baget-image" value="<?= $baget->price ?>"> Выбрать
								</label> 
								<div class="module-order-calc-baguettes-item-desc">
									<div>Артикул: <?= $baget->articul ?></div> 
									<div>Материал: <?= $baget->material ?></div> 
									<div>Ширина: <?= $baget->width ?> см</div> 
									<div>Цвет: <?= $baget->color ?></div> 
									<div>Цена: <?= $baget->price ?> ₽ п.м.</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul> 
						<a href="#" uk-slidenav-previous="" uk-slider-item="previous" class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-previous uk-icon uk-slidenav">
							<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous">
								<polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline>
							</svg>
						</a> 
						<a href="#" uk-slidenav-next="" uk-slider-item="next" class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-next uk-icon uk-slidenav">
							<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next">
								<polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline>
							</svg>
						</a>
					</div>
					<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
						<!--<li uk-slider-item="0" class="uk-active">
							<a href="#"></a>
						</li>
						<li uk-slider-item="1">
							<a href="#"></a>
						</li>-->
					</ul> 
					<input type="hidden" name="baguette">
				</div> <!-- ./ end bagettes slider -->
			</div>
		</div>
	</div>
</div>

<?php foreach ($types as $type): ?>
	<a href="#"><img src="images/posters/" alt="<?= $type->name ?>"></a>
<?php endforeach; ?>

<br>

