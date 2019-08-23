<?php

use yii\helpers\Html;


/*for( $i=1; $i<=count($catalog); $i++ ) {
	echo $catalog[$i].name;
}*/

?>

<h1><?= $this->title ?></h1>

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

<?php 

	//echo '123';

	//rint '456';

	// PHP 4,5,7

	// функциональное программирование / ООП (объектно-ориентированное программирование)

	// реализация функции
	function article( $header, $text, $link='#' ) {
		// тело функции
		echo '<h2>'.$header.'</h2>';
		echo '<p>'.$text.'</p>';
		echo '<a href="'.$link.'">Далее</a>';
	}

	// вызов функции
	//article('Заголовок 1', 'текст 1', '/post1');
	
	function counter( $max ) {
		// while - цикл с предусловием
		/*while($max > 0) {
			echo $max.'...';
			$max--;
		}*/

		// do..while - цикл с постусловием
		do {
			echo $max.'...';
			$max--;
		} while($max > 0);
	}

	//counter(0);

	function add($a, $b) {
		$result = $a + $b;	// $result - локальная переменная / локальную область видимости
		echo 'Сумма a+b = '.$result;

		return $result;	// функция возвращает значение $result
	}

	//$result = add(45,8);	// глобальная перменная - глобальная область видимости

	//echo ' Результат = '.$result;

	// область видимости

	// php, JS - нетипизированные языки

	/**
	 * строка
	 * число (целое, дробное)
	 * массив
	 * логическая
	 * ...
	 * 
	 * C/C++, Pascal... 
	 * 
	 */

	 // PHP 7 - типы
	 $a = 5;	// integer
	 $b = 45.56;	// double
	 $c = 'Привет';	// string
	 $d = true;	// boolean

	/**
	 * JS - нетипизированный
	 * TypeScript - JS с типами
	 */

	 $d = 89;
	// PHP-функция, которая возвращает тип
	//echo gettype($d);

	// 0,1, ....


	function args() {
		$args = func_get_args();
		if( $args ) {
			//
			foreach( $args as $arg ) {
				echo 'Аргумент = '.$arg;
			}
		} else {
			echo 'Нет аргументов';
		}
	}

	//args(5,89,'456465');

	// ООП

	// автомобиль:
	/**
	 * 	свойства: легковой, седан, цвет, пробег, год...
	 *  что-то делает: едет, стоит, паркуется...
	 */

	 class Cars {
		// свойства = переменные,массивы
		//public,private,protected
		// public - доступ вне класса в любом месте программы
		// private - доступ только внутри самого класса
		// protected - Доступ только в классах-наследниках

		protected $mark;
		public $color;
		public $year;
		
		// методы = функции
		public function drive() {
			echo 'Автомобиль '.$this->mark.' едет';
		}

	 }

	 class Truks extends Cars {
		public function truk() {
			echo 'Грузовик '.$this->mark ='KAMAZ';
		}

	 }

	 // создали экземпляр (объект) класса Cars
	 /*$toyota = new Cars;
	 $toyota->mark = 'Toyota';
	 $toyota->color = 'red';
	 $toyota->year = '2018';
	 $toyota->drive();

	 $bmw = new Cars;
	 $bmw->mark = 'BMW';
	 $bmw->drive();*/

	 //$kamaz = new Truks;
	 //$kamaz->mark = 'KAMAZ';
	 //$kamaz->truk();

?>