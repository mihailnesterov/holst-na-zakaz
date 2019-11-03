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
        'id' => 'form-poster',
        'options' => [
            'class' => '',
            //'enctype' => 'multipart/form-data'
        ],
    ]); ?>
    <fieldset class="uk-fieldset">
        <div class="uk-margin">
            <?= $form->field($model, 'articul', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'tabindex' => '1',
                    'placeholder' => 'Артикул',
                    'class'=>'uk-input',
                    //'pattern'=>'\D+([a-zA-Z0-9._@])$'
                ]
            ])->label('Артикул') ?>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'name', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '2',
                    'placeholder' => 'Название',
                    'class'=>'uk-input',
                ]
            ])->label('Название') ?>
        </div>

        <div class="uk-margin" uk-margin>
            <img id="poster-img" src="<?= $model->image != '' ? 'images/posters/'.$model->image : 'images/image.png' ?>" alt="">
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'image', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'id' => 'form-poster-image-input',
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
                        'id' => 'poster-image-file-input',
                        'tabindex' => '5',
                        'class' =>'uk-input',
                        'accept' => '.jpg, .jpeg, .png, .gif'
                    ]
                ])->fileInput()->label(false) ?>
                <input id="poster-image-file-name" class="uk-input uk-form-width-large" type="text" placeholder="<?= $model->image != '' ? $model->image : 'загрузите картинку' ?>" disabled >
            </div>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'autor', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '3',
                    'placeholder' => 'Автор',
                    'class'=>'uk-input',
                ]
            ])->label('Автор') ?>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'price', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '4',
                    'placeholder' => 'Базовая цена',
                    'class'=>'uk-input',
                ]
            ])->label('Базовая цена') ?>
        </div>

        <div class="uk-margin" uk-margin>
            <?= Html::submitButton('Сохранить', ['class' => 'uk-button uk-button-primary']) ?>
            <?php if( Yii::$app->controller->action->id !== 'poster-add' ):?>
            <?= Html::a(
                'Удалить', 
                [
                    '/admin/poster-delete', 'id' => $model->id
                ], 
                [
                    'class' => 'uk-button uk-button-danger',
                    'title' => 'Удалить "'.$model->articul.'"',
                    'data' => [
                        'confirm' => 'Удалить "'.$model->articul.'"?',
                        'method' => 'post',
                        ],
                ]
            ) ?>
            <?php endif; ?>
            <?= Html::a('Отмена', Url::to(['/admin/posters']), ['class' => 'uk-button uk-button-default']) ?>
        </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
        
    </div>
</div>