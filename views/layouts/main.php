<?php
	
	use yii\helpers\Html;
	/*use yii\bootstrap\Nav;
	use yii\bootstrap\NavBar;
	use yii\widgets\Breadcrumbs;*/
    use app\assets\AppAsset;
    use app\components\catalogmenu\CatalogMenuWidget;

	AppAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl(Yii::$app->homeUrl.'web');
    //$catalog = Yii::$app->controller->getCatalogMenu();
  
    $this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <base href="<?= Yii::$app->homeUrl ?>">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?> | <?= Html::encode(Yii::$app->name) ?></title>
        
        <?php $this->head(); ?>
        
        <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => $directoryAsset . 'favicon.ico']) ?>
        
    </head>
    <body>
        <?php $this->beginBody(); ?>

        <div class="main-headerbar">
        <a class="main-headerbar-toggle" href="#offcanvas" uk-toggle>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                <path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z" font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible"></path>
            </svg>

            <span class="main-headerbar-toggle-text">
                Меню
            </span>
        </a>

    <nav class="main-nav">
        <ul>
            <li class="main-nav-item main-nav-item-parent">
                <a href="#">
                    Каталог
                </a>

                <div uk-dropdown>
                    <ul class="uk-nav uk-dropdown-nav">
                        <li>
                            <a href="/magic/">
                                Печать на холсте
                            </a>
                        </li>
                        <li>
                            <a href="/kollaj/">
                                Фотоколлаж
                            </a>
                        </li>
                        <li>
                            <a href="/pop-art/">
                                Портреты в стиле поп-арт
                            </a>
                        </li>
                        <li>
                            <a href="/portreti-pod-jivopis/">
                                Портреты под живопись
                            </a>
                        </li>
                        <li>
                            <a href="/portret-na-holste-po-fotografii/">
                                Портреты по фотографии
                            </a>
                        </li>
                        <li>
                            <a href="/portreti-love-is/">
                                Портреты в стиле love is
                            </a>
                        </li>
                        <li>
                            <a href="/mujskoi-portret/">
                                Мужской портрет
                            </a>
                        </li>
                        <li>
                            <a href="/jenskii-portret/">
                                Женский портрет
                            </a>
                        </li>
                        <li>
                            <a href="/portreti-v-obraze/">
                                Портреты в образе
                            </a>
                        </li>
                        <li>
                            <a href="/dream-art/">
                                Портреты дрим арт
                            </a>
                        </li>
                        <li>
                            <a href="/semeinii-portret/">
                                Семейный портрет
                            </a>
                        </li>
                        <li>
                            <a href="/svadebnyj-portret/">
                                Свадебный портрет
                            </a>
                        </li>
                        <li>
                            <a href="/avtorskii-portret/">
                                Авторский портрет
                            </a>
                        </li>
                        <li>
                            <a href="/fotomozaika-iz-fotografii/">
                                Фотомозаика из фотографий
                             </a>
                        </li>
                        <li>
                            <a href="/paintings/">
                                Готовые работы
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="main-nav-item">
                <a href="/our-works/">
                    Наши работы
                </a>
            </li>
            <li class="main-nav-item main-nav-item-parent">
                <a href="#">
                    Информация
                </a>

                <div uk-dropdown>
                    <ul class="uk-nav uk-dropdown-nav">
                        <li>
                            <a href="/warranty_and_returns/">
                                Гарантия и возврат
                            </a>
                        </li>
                        <li>
                            <a href="/reviews/">
                                Отзывы
                            </a>
                        </li>
                        <!--<li>
                            <a href="/akcii/">
                                Акции
                            </a>
                        </li>-->
                        <li>
                            <a href="/privacy/">
                                Политика конфиденциальности
                            </a>
                        </li>
                        <li>
                            <a href="/order/">
                                Условия публичной оферты
                            </a>
                        </li>
                        <li>
                            <a href="/stati/">
                                Статьи
                            </a>
                        </li>
                        <li>
                            <a href="/vakansii/">
                                Вакансии
                            </a>
                        </li>
                        <li>
                            <a href="/video/">
                        	    Видео
                    	    </a>
                		</li>
                        <li>
                            <a href="/novosti/">
                        	    Новости
                    		</a>
                		</li>
                        <li>
                            <a href="/baguettes/">
                        	    Каталог багетных рам
                    		</a>
                		</li>
                    </ul>
                </div>
            </li>
            <li class="main-nav-item">
                <a href="/about-us/">
                    О нас
                </a>
            </li>
            <li class="main-nav-item main-nav-item-parent">
                <a href="#">
                    Помощь
                </a>

                <div uk-dropdown>
                    <ul class="uk-nav uk-dropdown-nav">
                        <li>
                            <a href="/kak-oformit-zakaz/">
                                Как оформить заказ
                            </a>
                        </li>
                        <li>
                            <a href="/questions/">
                                Вопросы и ответы
                            </a>
                        </li>
                        <li>
                            <a href="/trebovaniya-k-foto/">
                                Требования к фотографии
                            </a>
                        </li>
                        <li>
                            <a href="/kassa/">
                                Оплатить заказ
                            </a>
                        </li>
                        <li>
                            <a href="/site_map/">
                                Карта сайта
                            </a>
                        </li>
                        <li>
                            <a href="#where-is-my-order" uk-toggle>
                                Где мой заказ
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="main-nav-item">
                <a href="/payment-delivery/">
                    Оплата и доставка
                </a>
            </li>
            <li class="main-nav-item">
              <a href="/akcii/">
                Акции
              </a>
            </li>
            <li class="main-nav-item">
                <a href="/contacts/">
                    Контакты
                </a>
            </li>
            <li class="main-nav-item main-nav-item-callback">
                <a href="#callback" uk-toggle>
                    Заказать обратный звонок
                </a>
            </li>
            <li class="main-nav-item">
                <a href="#quick-order" uk-toggle>
                    Заказ в 1 клик
                </a>
            </li>
        </ul>
    </nav>

    <a href="/" class="main-headerbar-logo">
        <img src="images/icons/logo.svg" alt="Holst-na-zakaz">
    </a>

    <div class="main-headerbar-buttons">

    </div>
</div>

<div id="offcanvas" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <div class="uk-panel">
            <ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav>
                <li class="uk-nav-header">
                    Меню
                </li>
                <li>
                    <a href="" >
                        Главная
                    </a>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        Каталог
                    </a>

                    <ul class="uk-nav-sub">
                        <li>
                            <a href="/magic/">
                                Печать на холсте
                            </a>
                        </li>
                        <li>
                            <a href="/kollaj/">
                                Фотоколлаж
                            </a>
                        </li>
                        <li>
                            <a href="/pop-art/">
                                Портреты в стиле поп-арт
                            </a>
                        </li>
                        <li>
                            <a href="/portreti-pod-jivopis/">
                                Портреты под живопись
                            </a>
                        </li>
                        <li>
                            <a href="/portret-na-holste-po-fotografii/">
                                Портреты по фотографии
                            </a>
                        </li>
                        <li>
                            <a href="/portreti-love-is/">
                                Портреты в стиле love is
                            </a>
                        </li>
                        <li>
                            <a href="/mujskoi-portret/">
                                Мужской портрет
                            </a>
                        </li>
                        <li>
                            <a href="/portreti-v-obraze/">
                                Портреты в образе
                            </a>
                        </li>
                        <li>
                            <a href="/dream-art/">
                                Портреты дрим арт
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/our-works/">
                        Наши работы
                    </a>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        Информация
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="/warranty_and_returns/">
                                Гарантия и возврат
                            </a>
                        </li>
                        <li>
                            <a href="/reviews/">
                                Отзывы
                            </a>
                        </li>
                        <li>
                            <a href="/akcii/">
                                Акции
                            </a>
                        </li>
                        <li>
                            <a href="/privacy/">
                                Политика конфиденциальности
                            </a>
                        </li>
                        <li>
                            <a href="/order/">
                                Условия публичной оферты
                            </a>
                        </li>
                        <li>
                            <a href="/stati/">
                                Статьи
                            </a>
                        </li>
                        <li>
                            <a href="/vakansii/">
                                Вакансии
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/about-us/">
                        О нас
                    </a>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        Помощь
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="/kak-oformit-zakaz/">
                                Как оформить заказ
                            </a>
                        </li>
                        <li>
                            <a href="/questions/">
                                Вопросы и ответы
                            </a>
                        </li>
                        <li>
                            <a href="/trebovaniya-k-foto/">
                                Требования к фотографии
                            </a>
                        </li>
                        <li>
                            <a href="/kassa/">
                                Оплатить заказ
                            </a>
                        </li>
                        <li>
                            <a href="/site_map/">
                                Карта сайта
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/payment-delivery/">
                        Оплата и доставка
                    </a>
                </li>
                <li>
                    <a href="/contacts/">
                        Контакты
                    </a>
                </li>
                <li class="uk-nav-header">
                    Обратная связь
                </li>
                <li>
                    <a href="#callback" uk-toggle>
                        Заказать обратный звонок
                    </a>
                </li>
                <li>
                    <a href="#quick-order" uk-toggle>
                        Заказ в 1 клик
                    </a>
                </li>
            </ul>

            <div class="uk-margin uk-text-muted uk-text-small">
                © Холст на заказ, <?php echo date('Y'); ?>
                <br>
                <a href="//holst-na-zakaz.ru" class="uk-link-text">
                    holst-na-zakaz.ru
                </a>
                <br>
                <a href="mailto:<?php //echo $infomail; ?>" class="uk-link-text">
                    <?php //echo $infomail; ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="bg_top">   
<div class="b0 bg_black">
    <header class="main-header">
        <div class="header_data uk-text-left cplas">
            <a href="<?php //echo $site; ?>">
            <div class="main-logo"></div></a>

            <div class="uk-h1 main-header-slogan uk-margin-remove slogan-size">Печать на холсте по фото</div>
            <p style="margin-top: 0">успей заказать в мае со скидкой</p>
        </div>
        <div class="rifht">
            <div class="header_data r">
                <div class="blog-phone">
                    <a href="tel:<?php echo Yii::$app->params['phones']['phone1']; ?>">
                        <div class="comagic_phone phone phone-24 big phone-size">
                            <?php echo Yii::$app->params['phones']['phone1']; ?>
                        </div>
                    </a><br>
                    <a href="tel:<?php echo Yii::$app->params['phones']['phone2']; ?>">
                        <a title="Viber" href="viber://add?number=79686038598">
                            <img src="images/icons/vib.png" alt="Viber">
                        </a>
                        <a title="WhatsApp" href="whatsapp://send?phone=+79686038598">
                            <img src="images/icons/wh.png" style="margin-left: 0;" alt="WhatsApp">
                        </a>
                        <div class="phone phone22 phone-size">
                            <?php echo Yii::$app->params['phones']['phone2']; ?>
                        </div>
                    </a><br>
                    <a class="mail phone-size" href="mailto:<?php echo Yii::$app->params['email']; ?>">
                        e-mail: <?php echo Yii::$app->params['email']; ?><br>
                    </a>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </header>
</div>
</div>  <!-- end bg_top -->

<div class="main-wrapper uk-container">
    <div class="--wrapper" uk-grid>

        <aside class="uk-width-1-5@m">
            <?php echo CatalogMenuWidget::widget();?>
        </aside>

        <div class="--catalog-content uk-width-expand@m">
            <?= $content ?>
        </div>

    </div>  <!-- end wrapper -->
</div>  <!-- end main-wrapper -->

            
<footer class="main-footer">
    <div class="main-footer-pasta"></div>

    <div class="wrapper">
        <a href="/" class="main-footer-logo">
          <img src="images/icons/logo.svg" alt="Холст на заказ" class="uk-margin-bottom" width="200">
        </a>
        <!--<a class="main-headerbar-toggle" href="#offcanvas" uk-toggle>
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
            <path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z" font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible">
            </path>
          </svg>
          <span class="main-headerbar-toggle-text">
             Меню
          </span>
        </a>-->
        <nav class="main-nav">
            <ul>
                <li class="main-nav-item main-nav-item-parent">
                    <a href="#">
                        Варианты обработки
                    </a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li>
                                <a href="/magic/">
                                    Печать на холсте
                                </a>
                            </li>
                            <li>
                                <a href="/kollaj/">
                                    Фотоколлаж
                                </a>
                            </li>
                            <li>
                                <a href="/pop-art/">
                                    Портреты в стиле поп-арт
                                </a>
                            </li>
                            <li>
                                <a href="/portreti-pod-jivopis/">
                                    Портреты под живопись
                                </a>
                            </li>
                            <li>
                                <a href="/portret-na-holste-po-fotografii/">
                                    Портреты по фотографии
                                </a>
                            </li>
                            <li>
                                <a href="/portreti-love-is/">
                                    Портреты в стиле love is
                                </a>
                            </li>
                            <li>
                                <a href="/mujskoi-portret/">
                                    Мужской портрет
                                </a>
                            </li>
                            <li>
                                <a href="/jenskii-portret/">
                                    Женский портрет
                                </a>
                            </li>
                            <li>
                                <a href="/portreti-v-obraze/">
                                    Портреты в образе
                                </a>
                            </li>
                            <li>
                                <a href="/dream-art/">
                                    Портреты дрим арт
                                </a>
                            </li>
                            <li>
                                <a href="/semeinii-portret/">
                                    Семейный портрет
                                </a>
                            </li>
                            <li>
                                <a href="/svadebnyj-portret/">
                                    Свадебный портрет
                                </a>
                            </li>
                            <li>
                                <a href="/avtorskii-portret/">
                                    Авторский портрет
                                </a>
                            </li>
                            <li>
                                <a href="/fotomozaika-iz-fotografii/">
                                    Фотомозаика из фотографий
                                </a>
                            </li>
                            <li>
                                <a href="/paintings/">
                                    Готовые работы
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--<li class="main-nav-item">
                    <a href="/our-works/">
                        Наши работы
                    </a>
                </li>-->
                <li class="main-nav-item main-nav-item-parent">
                    <a href="#">
                        Информация
                    </a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li>
                                <a href="/payment-delivery/">
                                    Оплата и доставка
                                </a>
                            </li>
                            <li>
                                <a href="/warranty_and_returns/">
                                    Гарантия и возврат
                                </a>
                            </li>
                            <li>
                                <a href="/reviews/">
                                    Отзывы
                                </a>
                            </li>
                            <li>
                                <a href="/akcii/">
                                    Акции
                                </a>
                            </li>
                            <li>
                                <a href="/stati/">
                                    Статьи
                                </a>
                            </li>
                            <li>
                                <a href="/vakansii/">
                                    Вакансии
                                </a>
                            </li>
                            <li>
                    			<a href="/about-us/">
                        			О нас
                    			</a>
                			</li>
                            <li>
                    			<a href="/video/">
                        			Видео
                    			</a>
                			</li>
                            <li>
                    			<a href="/novosti/">
                        			Новости
                    			</a>
                			</li>
                            <li>
                                <a href="#where-is-my-order" uk-toggle>
                                   Где мой заказ
                                </a>
                            </li>
                            <li>
                                <a href="/baguettes/">
                                   Каталог багетных рам
                    		    </a>
                		    </li>
                        </ul>
                    </div>
                </li>
                <!--<li class="main-nav-item">
                    <a href="/about-us/">
                        О нас
                    </a>
                </li>-->
                <li class="main-nav-item main-nav-item-parent">
                    <a href="#">
                        Помощь
                    </a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li>
                                <a href="/kak-oformit-zakaz/">
                                    Как оформить заказ
                                </a>
                            </li>
                            <li>
                                <a href="/questions/">
                                    Вопросы и ответы
                                </a>
                            </li>
                            <li>
                                <a href="/trebovaniya-k-foto/">
                                    Требования к фотографии
                                </a>
                            </li>
                            <li>
                                <a href="/kassa/">
                                    Оплатить заказ
                                </a>
                            </li>
                            <li>
                                <a href="/site_map/">
                                    Карта сайта
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--<li class="main-nav-item">
                    <a href="/contacts/">
                        Контакты
                    </a>
                </li>-->
                <!--<li class="main-nav-item main-nav-item-callback">-->
                <li class="main-nav-item">
                  <a href="#quick-order" uk-toggle>
                    Заказ в 1 клик
                  </a>
                </li>
                <li class="main-nav-item">
                  <a href="#callback" class="button new-button btn-calc2" uk-toggle>
                    Заказать обратный звонок
                  </a>
                </li>
            </ul>
        </nav>
        <br>
        <div uk-grid class="uk-margin-bottom">
            <div class="uk-width-1-3@m">
                <div class="main-footer-contacts">
                    <div class="main-footer-contacts-item">
                        <strong class="menu-footer uk-text-uppercase">
                            Контакты
                        </strong>
                        <br>
                        Бесплатный звонок по РФ:<br>
                        <a href="<?php echo Yii::$app->params['phones']['phone4']; ?>" class="main-footer-contacts-item-phone small-phone">
                            <?php echo Yii::$app->params['phones']['phone4']; ?>
                        </a><br>
                        <strong>Адрес:</strong> <?php echo Yii::$app->params['address']; ?>
                    </div>
                    <div class="main-footer-contacts-item">
                        <a
                            href="/contacts/#contacts-map"
                            class="uk-button uk-button-small uk-button-primary button"
                            style="background: #0387cf; padding: 3px 20px;"
                            <?php if (strpos($_SERVER['REQUEST_URI'], "/contacts") !== false) {
                                echo "uk-scroll";
                            } ?>
                        >
                            Схема проезда
                        </a>
                    </div>
                    <div class="main-footer-contacts-item">
                        Дополнительные телефоны:<br>
                        <a title="Viber" href="viber://add?number=79686038598" style="text-decoration: none;">
                            <img src="images/icons/vib.png" alt="Viber">
                        </a>
                        <a title="WhatsApp" href="whatsapp://send?phone=+79686038598" style="text-decoration: none;">
                            <img src="images/icons/wh.png" alt="WhatsApp">
                        </a>
                        <a title="Telegram" href="tg://resolve?domain=Holst-na-zakaz" style="text-decoration: none;">
                            <img src="images/icons/icon-telegram.png" alt="Telegram">
                        </a>&nbsp;
                        <a href="<?php echo Yii::$app->params['phones']['phone2']; ?>"
                            class="main-footer-contacts-item-phone small-phone">
                                <?php echo Yii::$app->params['phones']['phone2']; ?>
                        </a>
                    </div>
                    <div class="main-footer-contacts-item">
                        <img src="images/icons/icon-phone.png" alt="Phone">&nbsp;
                        <a href="<?php echo Yii::$app->params['phones']['phone1']; ?>"
                            class="main-footer-contacts-item-phone small-phone">
                            <?php echo Yii::$app->params['phones']['phone1']; ?> (Москва)
                        </a>
                        <br>
                        <img src="images/icons/icon-phone.png" alt="Phone">&nbsp;
                        <a href="<?php echo Yii::$app->params['phones']['phone3']; ?>"
                            class="main-footer-contacts-item-phone small-phone">
                            <?php echo Yii::$app->params['phones']['phone3']; ?> (Санкт-Петербург)
                        </a>
                    </div>
                    <div class="main-footer-contacts-item">
                        <img src="images/icons/icon-email.png" alt="Email">&nbsp;
                        <a href="mailto:<?php echo Yii::$app->params['email']; ?>"
                            class="main-footer-contacts-item-email small-phone">
                            <?php echo Yii::$app->params['email']; ?>
                        </a><br>
                        <a href="skype:Holst-na-zakaz.ru?chat" style="text-decoration: none;">
                            <img src="images/icons/icon-skype.png" alt="Skype">
                        </a>&nbsp;
                        <a href="skype:Holst-na-zakaz.ru?chat"><?php echo Yii::$app->params['skype']; ?></a>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-3@m">
                <div class="main-footer-contacts">
                    <div class="main-footer-contacts-item">
                        <strong class="menu-footer uk-text-uppercase">
                            График работы
                        </strong>
                        <br>
                        <div class="small-letter">
                            ПН-ПТ - c 10:00 до 18:00<br>
                            В выходные дни по предварительному согласованию
                        </div>
                    </div>
                    <div class="main-footer-contacts-item">
                        <strong class="menu-footer uk-text-uppercase">
                            Реквизиты
                        </strong>
                        <br>
                        <div class="small-letter uk-margin-small-bottom">
                            Индивидуальный предприниматель: Неровный Артем Александрович<br>
                            ИНН: 771392368278<br>
                            ОГРН: 318645100037301<br>
                            Расчетный счет: 40802810400000530348<br>
                            Банк: АО «Тинькофф Банк<br>
                            <a href="/includes/requisites.pdf" target="blank">Скачать реквизиты</a>
                        </div>
                        <a href="/privacy/">Политика конфиденциальности</a><br>
                        <a href="/order/">Условия публичной оферты</a>
                    </div>
                    <!--<li class="main-nav-item main-nav-item-callback">
                    	<a href="#callback" uk-toggle>
                        	Заказать обратный звонок
                    	</a>
                	</li>-->
                </div>
            </div>
            <div class="uk-width-1-3@m">
                <div class="main-footer-contacts">
                    <div class="uk-width-1-1 uk-margin-small">
                        <p style="margin-bottom: 0px";>Принимаем к оплате</p>
                        <div class="main-footer-payment">
                            <div class="main-footer-payment-item">
                                <a href="//holst-na-zakaz.ru/kassa/">
                                    <img src="images/payment/visa.png" width="50" alt="Visa">
                                </a>
                            </div>
                            <div class="main-footer-payment-item">
                                <a href="//holst-na-zakaz.ru/kassa/">
                                    <img src="images/payment/mastercard.png" width="70" alt="Mastercard">
                                </a>
                            </div>
                            <div class="main-footer-payment-item">
                                <a href="//holst-na-zakaz.ru/kassa//">
                                    <img src="images/payment/mir.png" width="70" alt="МИР">
                                </a>
                            </div>
                            <div class="payment-methods-item">
                                <a href="//holst-na-zakaz.ru/kassa/">
                                    <img src="images/payment/yamoney.png" width="130" alt="Яндекс.Деньги">
                                </a>
                            </div>
                        </div>
                        <div class="subscription">
                            <p>Подписывайтесь на наc<br>
                                <a href="https://vk.com/holstnazakazmsk" target="_blank">
                                    <img src="images/icons/icon-vk.png" class="icons-social" style="margin: 0 5px 0 15px;"
                                        alt="VK" title="VK">
                                </a>
                                <a href="https://www.instagram.com/mr.holst_na_zakaz/" target="_blank">
                                    <img src="images/icons/icon-instagram.png" class="icons-social" style="margin-right: 5px;"
                                        alt="Instagram" title="Instagram">
                                </a>
                                <a href="https://www.facebook.com/kartina.na.zakaz/" target="_blank">
                                    <img src="images/icons/icon-facebook.png" class="icons-social" style="margin-right: 5px;" alt="Facebook" title="Facebook">
                                </a>
                                <a href="https://www.youtube.com/channel/UCmMxngnmaLF89pmolo1VqYQ?view_as=subscriber/"target="_blank">
                                    <img src="images/icons/icon-youtube.png" class="icons-social" style="margin-right: 5px;" alt="Youtube" title="Youtube">
                                </a>
                                <a href="https://twitter.com/o6d7ADK84neabqL?lang=en" target="_blank">
                                    <img src="images/icons/icon-twitter.png" class="icons-social" style="margin-right: 5px;" alt="Twitter" title="Twitter">
                                </a>
                                <a href="https://ok.ru/group/55833923944548" target="_blank">
                                    <img src="images/icons/icon-odnoklassniki.png" class="icons-social" alt="Odnoklassniki" title="Odnoklassniki">
                                </a>
                            </p>
                        </div>
                        <!--<a href="#consultation" class="button new-button" uk-toggle style="background: #0387cf">
                            Получить консультацию
                        </a>-->
                        <a href="#review-modal" class="uk-button uk-button-primary button btn-write-reviews" uk-toggle>
                           Написать отзыв
                        </a>

                        <?php //include_once "../includes/reviews/form.php"; ?>
                    </div>
                </div>
            </div>
            <div class="main-footer-copyright">
                © Холст на заказ, <!--<?php echo date('Y'); ?>--> <?php //echo $dates; ?>
                &nbsp;|&nbsp;
                <a href="//holst-na-zakaz.ru">holst-na-zakaz.ru</a>
                &nbsp;|&nbsp;
                <a href="mailto:<?php //echo $infomail1; ?>" class="main-footer-contacts-item-email">
                    <?php //echo $infomail1; ?>
                </a>
                <?php /*
                <br>
                This site is protected by reCAPTCHA and the Google
                <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                */ ?>
            </div>
        </div>
    </div>

    <?php //include('schema-organization.php'); ?>
</footer>
        <?php yii\bootstrap4\Modal::begin([
            'id' => 'modal-add-to-cart',
            //'header' => '<h2><i class="fa fa-shopping-cart uk-margin-right uk-text-danger"></i>Корзина</h2>',
            'closeButton' => [ 
                'label' => 'x',
            ],
            /*'options' => [
                'class' => 'modal-class',
            ],*/
            'size' => 'modal-xl',
            'footer' => '
                <button type="button" data-dismiss="modal" class="uk-button uk-button-default">
                    Продолжить покупки
                </button>
                <button type="button" class="uk-button uk-button-danger">
                    Оформить заказ
                </button>
            ',
        ]);?>
            <?php //... empty ?>             
        <?php yii\bootstrap4\Modal::end(); ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
