<?php
/**
 * order
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $order app\models\Orders */
/* @var $form ActiveForm */
?>



<div class="uk-width-1-1">
    <div class="uk-margin">
    
        <h1 class="uk-heading-divider uk-heading-bullet uk-margin-medium-bottom">
            <?= Html::encode($this->title) ?>
        </h1>
        <div class="uk-box-shadow-medium uk-padding uk-margin-medium-bottom">
            <h3 class="uk-heading-divider uk-margin-remove-top uk-margin-small-bottom">
                Выбранные картины:
            </h3>
            <?php echo $this->context->renderPartial('add-to-cart', [
                    'session' => $session
                ]); 
            ?>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'form-order',
            'options' => [
                'class' => 'uk-box-shadow-medium uk-padding uk-margin-medium-bottom',
                //'enctype' => 'multipart/form-data'
            ],
        ]); ?>
        <h3 class="uk-heading-divider uk-margin-remove-top uk-margin-medium-bottom">
            Данные для отправки заказа:
        </h3>
        <fieldset class="uk-fieldset">
            <div uk-grid="" class="uk-grid">
                <div class="uk-width-1-3@m uk-first-column">
                    <div class="uk-margin">
                        <?= $form->field($order, 'name', [
                            'template' => '{input}{error}',
                            'inputOptions' => [
                                'autofocus' => 'autofocus',
                                'tabindex' => '1',
                                'placeholder' => 'Имя *',
                                'class'=>'uk-input uk-width-1-1',
                            ]
                        ])->label(false) ?>
                    </div>
                    <div class="uk-margin">
                        <?= $form->field($order, 'email', [
                            'template' => '{input}{error}',
                            'inputOptions' => [
                                'tabindex' => '2',
                                'placeholder' => 'Почта *',
                                'class'=>'uk-input uk-width-1-1',
                            ]
                        ])->label(false) ?>
                    </div>
                    <div class="uk-margin">
                        <?= $form->field($order, 'phone', [
                            'template' => '{input}{error}',
                            'inputOptions' => [
                                'tabindex' => '3',
                                'placeholder' => 'Телефон *',
                                'class'=>'uk-input uk-width-1-1',
                            ]
                        ])->label(false) ?>
                    </div>
                    <!--<div class="uk-margin">
                        <input type="text" name="name" placeholder="Имя *" class="uk-input uk-width-1-1">
                    </div>
                    <div class="uk-margin">
                        <input type="email" name="email" placeholder="Почта *" class="uk-input uk-width-1-1">
                    </div>
                    <div class="uk-margin">
                        <input type="text" name="phone" placeholder="Телефон *" class="uk-input uk-width-1-1">
                    </div>-->
                </div>
                <div class="uk-width-2-3@m">
                    <div class="uk-margin">
                        <?= $form->field($order, 'comment', [
                            'template' => '{input}{error}',
                            'inputOptions' => [
                                'tabindex' => '4',
                                'placeholder' => 'Комментарий к заказу',
                                'class'=>'uk-textarea uk-width-1-1'
                            ]
                        ])->textarea(['rows' => 4, 'cols' => 10])->label(false) ?>
                    </div>
                    <!--<div class="uk-margin">
                        <textarea name="comment" placeholder="Комментарий к заказу" class="uk-input uk-width-1-1" style="resize: vertical; height: 100px;"></textarea>
                    </div>-->
                    <div uk-grid="" class="uk-grid">
                        <div class="uk-width-1-3@m uk-first-column">
                            <div class="uk-margin">
                                <?= $form->field($order, 'address', [
                                    'template' => '{input}{error}',
                                    'inputOptions' => [
                                        'tabindex' => '5',
                                        'placeholder' => 'Адрес доставки',
                                        'class'=>'uk-input uk-width-1-1',
                                    ]
                                ])->label(false) ?>
                            </div>
                            <!--<div class="uk-margin">
                                <input type="text" name="address" placeholder="Адрес доставки" class="uk-input uk-width-1-1">
                            </div>-->
                        </div>
                        <div class="uk-width-1-3@m">
                            <div class="uk-margin">
                                <?= $form->field($order, 'date', [
                                    'template' => '{input}{error}',
                                    'inputOptions' => [
                                        'tabindex' => '6',
                                        'type' => 'date',
                                        'value' => date("Y-m-d"),
                                        'placeholder' => 'Дата доставки',
                                        'class'=>'uk-input uk-width-1-1',
                                    ]
                                ])->label(false) ?>
                            </div>
                            <!--<div class="uk-margin">
                                <div class="">
                                    <input type="date" name="delivery_date" placeholder="Дата доставки" value="<?php echo date("Y-m-d");?>" autocomplete="on" class="uk-input uk-width-1-1">
                                </div>
                            </div>-->
                        </div> 
                        <div class="uk-width-1-3@m">
                            <div class="uk-margin">
                                <?= $form->field($order, 'time', [
                                    'template' => '{input}{error}',
                                    'inputOptions' => [
                                        'tabindex' => '7',
                                        'placeholder' => 'с 00:00 до 00:00',
                                        'class'=>'uk-input uk-width-1-1',
                                    ]
                                ])->label(false) ?>
                            </div>
                            <!--<div class="uk-margin">
                                <input type="text" name="delivery_time" placeholder="С 00:00 до 00:00" maxlength="100" class="uk-input uk-width-1-1">
                            </div>-->
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
                                <?= $form->field($order, 'promo', [
                                    'template' => '{input}{error}',
                                    'inputOptions' => [
                                        'tabindex' => '8',
                                        'placeholder' => 'Промо-код',
                                        'class'=>'uk-input uk-width-1-1',
                                    ]
                                ])->label(false) ?>
                            </div>
                        </div>
                        <!--<div class="uk-margin">
                            <div 
                                id="promo-calc-input" 
                                uk-tooltip="title: Введите промокод" 
                                class="uk-inline uk-width-1-1" 
                                title="" aria-expanded="false"
                            >
                                <input type="text" name="promo_id" placeholder="Промо-код" class="uk-input uk-input-small uk-width-1-1">
                            </div>
                        </div>-->
                    </div> 
                    <div class="uk-width-2-3@m">
                        <label>
                            <input type="checkbox" name="policy" class="uk-checkbox" checked="checked">
                            &nbsp; Я ознакомлен и согласен с <a href="//holst-na-zakaz.ru/privacy/" target="_blank">условиями конфиденциальности</a>
                        </label>
                    </div>
                </div>
            </div> 
            <div class="uk-margin uk-margin-medium-top uk-margin-medium-bottom uk-text-left">
                <?= Html::submitButton('Оформить заказ', ['class' => 'button uk-button uk-button-large btn-calc1']) ?>
            </div>
        </fieldset>
        <?php ActiveForm::end(); ?>
    </div>
</div>
