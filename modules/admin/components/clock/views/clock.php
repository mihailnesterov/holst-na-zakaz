<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\AddService */
/* @var $form ActiveForm */
?>

<div class="uk-container uk-margin-large-bottom uk-margin-top">
    <h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>
        
    <div class="uk-child-width-1-2 uk-text-left" uk-grid>
    
    <?php $form = ActiveForm::begin([
        'id' => 'form-clock',
        'options' => [
            'class' => '',
            //'enctype' => 'multipart/form-data'
        ],
    ]); ?>
    <fieldset class="uk-fieldset">
        <div class="uk-margin">
            <?= $form->field($model, 'name', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'tabindex' => '1',
                    'placeholder' => 'Название',
                    'class'=>'uk-input',
                ]
            ])->label(false) ?>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'price', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '2',
                    'placeholder' => 'Цена',
                    'class'=>'uk-input',
                ]
            ])->label('Цена') ?>
        </div>

        <div class="uk-margin" uk-margin>
            <img id="clock-img" src="<?= $model->src != '' ? 'images/clocks/'.$model->src : 'images/image.png' ?>" alt="<?= $model->name ?>">
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'src', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'id' => 'form-clock-image-input',   // id используем в js/jquery
                    'type' => 'hidden',
                    'placeholder' => 'Картинка',
                    'class'=>'uk-input'
                ]
            ])->label(false) ?>
        </div>

        <div class="uk-margin" uk-margin>
            <div uk-form-custom="target: true">
                <span class="uk-form-icon" uk-icon="icon: download"></span>
                <?= $form->field($model, 'imageFile', [
                    'template' => '{input}{error}',
                    'inputOptions' => [
                        'id' => 'clock-image-file-input',
                        'tabindex' => '3',
                        'class' =>'uk-input',
                        'accept' => '.gif, .jpg, .jpeg, .png'
                    ]
                ])->fileInput()->label(false) ?>
                <input id="clock-image-file-name" class="uk-input uk-form-width-large" type="text" placeholder="<?= $model->src != '' ? $model->src : 'загрузите картинку' ?>" disabled >
            </div>
        </div>

        <div class="uk-margin" uk-margin>
            <?= Html::submitButton('Сохранить', ['class' => 'uk-button uk-button-primary']) ?>
            <?php if( Yii::$app->controller->action->id !== 'clock-add' ):?>
            <?= Html::a(
                'Удалить', 
                [
                    '/admin/clock-delete', 'id' => $model->id
                ], 
                [
                    'class' => 'uk-button uk-button-danger',
                    'title' => 'Удалить "'.$model->name.'"',
                    'data' => [
                        'confirm' => 'Удалить "'.$model->name.'"?',
                        'method' => 'post',
                        ],
                ]
            ) ?>
            <?php endif; ?>
            <?= Html::a('Отмена', Url::to(['/admin/clocks']), ['class' => 'uk-button uk-button-default']) ?>
        </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
        
    </div>
</div>