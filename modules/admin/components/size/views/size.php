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
        'id' => 'form-size',
        'options' => [
            'class' => '',
            //'enctype' => 'multipart/form-data'
        ],
    ]); ?>
    <fieldset class="uk-fieldset">
        <div class="uk-margin">
            <?= $form->field($model, 'width', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'tabindex' => '1',
                    'placeholder' => 'Ширина',
                    'class'=>'uk-input',
                    //'pattern'=>'\D+([a-zA-Z0-9._@])$'
                ]
            ])->label(false) ?>
        </div>

        <div class="uk-margin">
            <?= $form->field($model, 'height', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'tabindex' => '2',
                    'placeholder' => 'Высота',
                    'class'=>'uk-input',
                ]
            ])->label(false) ?>
        </div>
        <div class="uk-margin" uk-margin>
            <?= Html::submitButton('Сохранить', ['class' => 'uk-button uk-button-primary']) ?>
            <?= Html::a(
                'Удалить', 
                [
                    '/admin/size-delete', 'id' => $model->id
                ], 
                [
                    'class' => 'uk-button uk-button-danger',
                    'title' => 'Удалить "'.$model->width.'x'.$model->height.'"',
                    'data' => [
                        'confirm' => 'Удалить "'.$model->width.'x'.$model->height.'"?',
                        'method' => 'post',
                        ],
                ]
            ) ?>
            <?= Html::a('Отмена', Url::to(['/admin/sizes']), ['class' => 'uk-button uk-button-default']) ?>
        </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
        
    </div>
</div>