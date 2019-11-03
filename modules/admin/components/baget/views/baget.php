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
        'id' => 'form-baget',
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
            <?= $form->field($model, 'material', [
                'inputOptions' => [
                    'tabindex' => '2',
                    'class'=>'uk-select'
                ]
            ])->dropDownList($materials)->label('Материал') ?>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'width', [
                'inputOptions' => [
                    'tabindex' => '3',
                    'class'=>'uk-select'
                ]
            ])->dropDownList($width)->label('Толщина') ?>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'color', [
                'inputOptions' => [
                    'tabindex' => '4',
                    'class'=>'uk-select'
                ]
            ])->dropDownList($colors)->label('Цвет') ?>
        </div>

        <div class="uk-margin" uk-margin>
            <img id="baget-img" src="<?= $model->image != '' ? 'images/baguettes/'.$model->image : 'images/image.png' ?>" alt="">
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'image', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'id' => 'form-baget-image-input',   // id используем в js/jquery
                    //'tabindex' => '5',
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
                        'id' => 'baget-image-file-input',
                        'tabindex' => '5',
                        'class' =>'uk-input',
                        'accept' => '.jpg, .jpeg, .png'
                    ]
                ])->fileInput()->label(false) ?>
                <input id="baget-image-file-name" class="uk-input uk-form-width-large" type="text" placeholder="<?= $model->image != '' ? $model->image : 'загрузите картинку' ?>" disabled >
            </div>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'price', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '6',
                    'placeholder' => 'Цена',
                    'class'=>'uk-input',
                ]
            ])->label('Цена') ?>
        </div>

        <div class="uk-margin" uk-margin>
            <?= Html::submitButton('Сохранить', ['class' => 'uk-button uk-button-primary']) ?>
            <?php if( Yii::$app->controller->action->id !== 'baget-add' ):?>
            <?= Html::a(
                'Удалить', 
                [
                    '/admin/baget-delete', 'id' => $model->id
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
            <?= Html::a('Отмена', Url::to(['/admin/bagets']), ['class' => 'uk-button uk-button-default']) ?>
        </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
        
    </div>
</div>