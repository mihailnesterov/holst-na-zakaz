<?php
use yii\helpers\Html;
use yii\helper\Url;
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

<div class="uk-container uk-margin-large-bottom">
	<ul class="uk-breadcrumb uk-background-muted uk-padding-small uk-text-xsmall">
		<li><a href="#">Картины</a></li>
		<li><a href="#">Архитектура</a></li>
		<li><span><?= $poster->name ?></span></li>
	</ul>
	<h1 class="uk-heading-divider uk-margin-medium-bottom">
		<?= Html::encode($this->title) ?> 
		<span class="uk-text-small uk-text-middle">Артикул: <?= $poster->articul ?></span>
	</h1>
    <div class="uk-text-center1" uk-grid>
		<div class="uk-width-1-3@m">
			<div class="uk-card uk-card-default uk-card-body1">	
				<div class="module-order-calc-steps-item active">
					<a href="#" class="module-order-calc-steps-item-title">
						Выберите размер (см)
					</a> 
					<!--<div  class="module-order-calc-steps-item-subtitle">
						30×45
					</div> -->
					<div class="module-order-calc-steps-item-body">
						<a href="#" class="module-order-calc-sizes-item uk-active">
							30×45
						</a>
						<a href="#" class="module-order-calc-sizes-item">
							40×60
						</a>
						<a href="#" class="module-order-calc-sizes-item">
							50×75
						</a>
						<a href="#" class="module-order-calc-sizes-item">
							60×90
						</a>
						<a href="#" class="module-order-calc-sizes-item">
							120×80
						</a> 
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
					<script>
						// js-скрипт выбор размера
						/*var s=0;
						
						const f=5;
						let g='asdsfs';

						s = 69;*/
						// JavaScript - нетипизированный
						// TypeScript - типизированный JS

						/**
							window
								document.getElementsByClassName
								document.getElementById
								document.querySelectorAll
						 */
						
						const sizesItems = document.getElementsByClassName('module-order-calc-sizes-item');
						//alert(sizesItems.length);
						console.log(sizesItems.length);

						for (let i = 0; i < sizesItems.length; i++) {
							
							/*function name() {

							}
							const name = () => {

							}*/

							sizesItems[i].onclick = (e) => {
								
								e.preventDefault();
								
								for (let j = 0; j < sizesItems.length; j++) {
									sizesItems[j].classList.remove('uk-active');
								}
								
								e.target.classList.add('uk-active');
								
								const canvasSizesWoman = document.getElementById('img-canvas-sizes-woman');
									canvasSizesWoman.src = `images/canvas-sizes-woman/${i+1}.jpg`;
									canvasSizesWoman.alt = e.target.innerHTML;
								
								const inputHiddenSize = document.querySelector('input[name=size]');
									if(inputHiddenSize) { inputHiddenSize.value = e.target.innerHTML };
								
								const inputTypeNumber = document.querySelectorAll('input[type=number]');
									console.log(inputTypeNumber.length);
									inputTypeNumber[0].value = 30;
									inputTypeNumber[1].value = 45;
							}
						}
					</script>
				</div>

				<div class="module-order-calc-steps-item active">
					<a href="#" class="module-order-calc-steps-item-title">
						Выберите материал
					</a> 
					<!--<div class="module-order-calc-steps-item-subtitle">
						Холст искусственный
					</div> -->
					<div class="module-order-calc-steps-item-body">
						<?php foreach($posterMaterials as $material): ?>
						<div class="module-order-calc-materials-item">
							<label>
								<input type="radio" name="radio-materials" value="<?= $material->id ?>">&nbsp;
									<?= $material->material->name ?>
									&nbsp;
									<span class="uk-label">
									<?= $material->price ?> ₽
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
								<input checked='checked' type="radio" name="radio-bagets-width" value="<?= $width->width ?>">&nbsp;
							<?php else: ?>
								<input type="radio" name="radio-bagets-width" value="<?= $width->width ?>">&nbsp;
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
						<input type="checkbox" value="[object Object]">&nbsp;
							<?= $service->addService->name ?>
							<span class="uk-label">
								<?= $service->price ?> ₽
							</span>
							</label> 
							<a aria-hidden="true" href="#addon-info-pokritie-lakom" uk-toggle="" class="module-order-calc-addons-item-help"><span uk-icon="icon: question" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="question"><circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <circle cx="10.44" cy="14.42" r="1.05"></circle> <path fill="none" stroke="#000" stroke-width="1.2" d="M8.17,7.79 C8.17,4.75 12.72,4.73 12.72,7.72 C12.72,8.67 11.81,9.15 11.23,9.75 C10.75,10.24 10.51,10.73 10.45,11.4 C10.44,11.53 10.43,11.64 10.43,11.75"></path></svg></span></a> <div id="addon-info-pokritie-lakom" uk-modal="" class="uk-modal"><div class="uk-modal-dialog uk-modal-body"><button type="button" uk-close="" class="uk-modal-close-default uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button> <h2 class="uk-modal-title">Покрытие лаком</h2> <div><p>Покрытие лаком зашивает картину от всевозможных механических повреждений.</p><p>После покрытия лаком картина приобретает благородный блеск и ее можно протирать влажной тканью.</p><p><img class="lazyload" data-src="/img/desc/lak.jpg" alt=""></p></div></div></div>
						</div>
					</div>
					<?php endforeach; ?>
					<input type="hidden" name="addons" value="Покрытие лаком, Покрытие 3D гелем">
				</div>

				<div class="module-order-calc-steps-item inactive">
					<a href="#" class="module-order-calc-steps-item-title">
						Багет
					</a> 
					<div class="module-order-calc-steps-item-body">
						<div class="module-order-calc-addons-item">
						<label>
						<input type="checkbox" value="">&nbsp;
							Добавить багетную раму
						</label> 
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="uk-width-expand@m">
			<div class="uk-card uk-card-default uk-card-body">
				<?php echo PosterListImageWidget::widget([ 'poster_id' => $poster->id ]);?>
				
				<hr>
				<?php foreach ($images as $image): ?>
					<img  data-src="images/posters/<?= $image->src ?>" alt="<?= $image->src ?>" width="100%" uk-img>
				<?php endforeach; ?>
			</div>
		</div>
    
</div>



<h2><?= $poster->name ?></h2>
<h3><?= $poster->articul ?></h3>
<h3><?= $poster->autor ?></h3>
<h3><?= $poster->price ?></h3>
<p><?= $poster->text ?></p>

<?php foreach ($types as $type): ?>
	<a href="#"><img src="images/posters/" alt="<?= $type->name ?>"></a>
<?php endforeach; ?>

<br>

<?php foreach ($images as $image): ?>
	<img src="images/posters/<?= $image->src ?>" alt="<?= $image->src ?>">
<?php endforeach; ?>

<ul>
<?php foreach ($posterSizes as $size): ?>
	<li><?= $size->size->width ?> <?= $size->size->height ?> <?= $size->price ?></li>
<?php endforeach; ?>
</ul>

<ul>
<?php foreach ($bagetsWidth as $baget): ?>
	<li><?= $baget->width ?> см.</li>
<?php endforeach; ?>
</ul>

<ul>
<h3>123456</h3>
<?php foreach ($posterMaterials as $material): ?>
<li><?= $material->material->name ?> <?= $material->price ?> <a href="#" title="<?= $material->material->description ?>">?</a></li>
<?php endforeach; ?>
</ul>

<ul>
<?php foreach ($postersAddServices as $service): ?>
	<li><?= $service->addService->name ?> <?= $service->price ?> <a href="#" title="<?= $service->addService->description ?>">?</a></li>
<?php endforeach; ?>
</ul>

<!-- выводим все багеты -->
<?php foreach ($bagets as $baget): ?>
	<img src="images/baguettes/<?= $baget->image ?>" alt="<?= $baget->material ?> <?= $baget->color ?>">
	<p>Артикул: <?= $baget->articul ?></p>
	<p>Материал: <?= $baget->material ?></p>
	<p>Ширина: <?= $baget->width ?> см.</p>
	<p>Цвет: <?= $baget->color ?></p>
	<p>Цена: <?= $baget->price ?> руб.</p>
	<br>
<?php endforeach; ?>
