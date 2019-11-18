<?php
/**
 * order
 */
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\search\SearchWidget;
use app\components\cart\CartWidget;
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

<div class="uk-width-1-1 uk-margin-medium-top">
    <div class="uk-margin">
    
        <h1 class="uk-heading-divider uk-heading-bullet uk-margin-medium-bottom">
            <?= Html::encode($this->title) ?>
        </h1>
        <div class="uk-margin-medium-bottom">
            <?php echo $this->context->renderPartial('add-to-cart', [
                    'session' => $session
                ]); 
            ?>
        </div>

        <h2 class="uk-heading-bullet uk-margin-medium-bottom">
            Заполните данные для отправки заказа:
        </h2>

        <div uk-grid="" class="uk-grid">
            <div class="uk-width-1-3@m uk-first-column">
                <div class="uk-margin">
                    <input type="text" name="name" placeholder="Имя *" class="uk-input uk-width-1-1">
                </div> 
                <div class="uk-margin">
                    <input type="email" name="email" placeholder="Почта *" class="uk-input uk-width-1-1">
                </div>
                <div class="uk-margin">
                    <input type="text" name="phone" placeholder="Телефон *" class="uk-input uk-width-1-1">
                </div>
            </div>
            <div class="uk-width-2-3@m">
                <div class="uk-margin">
                    <textarea name="comment" placeholder="Комментарий к заказу" class="uk-input uk-width-1-1" style="resize: vertical; height: 100px;"></textarea>
                </div>
                <div uk-grid="" class="uk-grid">
                    <div class="uk-width-1-3@m uk-first-column">
                        <div class="uk-margin">
                            <input type="text" name="address" placeholder="Адрес доставки" class="uk-input uk-width-1-1">
                        </div>
                    </div>
                    <div class="uk-width-1-3@m">
                        <div class="uk-margin">
                            <div class="">
                                <input type="date" name="delivery_date" placeholder="Дата доставки" value="<?php echo date("Y-m-d");?>" autocomplete="on" class="uk-input uk-width-1-1">
                            </div>
                         </div>
                    </div> 
                    <div class="uk-width-1-3@m">
                        <div class="uk-margin">
                            <input type="text" name="delivery_time" placeholder="С 00:00 до 00:00" maxlength="100" class="uk-input uk-width-1-1">
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="uk-margin">
            <div uk-grid="" class="uk-grid">
                <div class="uk-width-1-3@m uk-first-column">
                    <div class="uk-margin">
                        <div 
                            id="promo-calc-input" 
                            uk-tooltip="title: Введите промокод" 
                            class="uk-inline uk-width-1-1" 
                            title="" aria-expanded="false"
                        >
                            <input type="text" name="promo_id" placeholder="Промо-код" class="uk-input uk-input-small uk-width-1-1">
                        </div>
                    </div>
                </div> 
                <div class="uk-width-2-3@m">
                    <label>
                        <input type="checkbox" name="policy" class="uk-checkbox" checked>
                        &nbsp; Я ознакомлен и согласен с <a href="/privacy/" target="_blank">условиями конфиденциальности</a>
                    </label>
                </div>
            </div>
        </div> 
        <div class="uk-margin uk-margin-medium-top uk-margin-medium-bottom uk-text-left">
            <!--<p>
                <a href="#video-order" uk-toggle="" class="uk-text-muted"><span uk-icon="info" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="info"><path d="M12.13,11.59 C11.97,12.84 10.35,14.12 9.1,14.16 C6.17,14.2 9.89,9.46 8.74,8.37 C9.3,8.16 10.62,7.83 10.62,8.81 C10.62,9.63 10.12,10.55 9.88,11.32 C8.66,15.16 12.13,11.15 12.14,11.18 C12.16,11.21 12.16,11.35 12.13,11.59 C12.08,11.95 12.16,11.35 12.13,11.59 L12.13,11.59 Z M11.56,5.67 C11.56,6.67 9.36,7.15 9.36,6.03 C9.36,5 11.56,4.54 11.56,5.67 L11.56,5.67 Z"></path> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle></svg></span> Как оформить заказ?</a></p> <p><a href="#video-create" uk-toggle="" class="uk-text-muted"><span uk-icon="info" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="info"><path d="M12.13,11.59 C11.97,12.84 10.35,14.12 9.1,14.16 C6.17,14.2 9.89,9.46 8.74,8.37 C9.3,8.16 10.62,7.83 10.62,8.81 C10.62,9.63 10.12,10.55 9.88,11.32 C8.66,15.16 12.13,11.15 12.14,11.18 C12.16,11.21 12.16,11.35 12.13,11.59 C12.08,11.95 12.16,11.35 12.13,11.59 L12.13,11.59 Z M11.56,5.67 C11.56,6.67 9.36,7.15 9.36,6.03 C9.36,5 11.56,4.54 11.56,5.67 L11.56,5.67 Z"></path> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle></svg></span> Как мы рисуем</a>
            </p>-->
            <!--<input type="hidden" name="page" value="/index.php">--> 
            <button type="submit" class="button uk-button uk-button-primary uk-button-large btn-calc1">
                Оформить заказ
            </button>
        </div>
    </div>
</div>
