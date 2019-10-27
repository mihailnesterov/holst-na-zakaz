<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\Catalog */
/* @var $form ActiveForm */
?>

<div class="uk-container uk-margin-large-bottom uk-margin-top">
    <h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>
        
    <div class="uk-child-width-1-2 uk-text-left" uk-grid>
    
    <?php $form = ActiveForm::begin([
        'id' => 'form-category',
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
                    //'pattern'=>'\D+([a-zA-Z0-9._@])$'
                ]
            ])->label(false) ?>
        </div>
        <div class="uk-margin">
            <?= $form->field($model, 'parent', [
                'inputOptions' => [
                    'tabindex' => '2',
                    'class'=>'uk-select'
                ]
            ])->dropDownList($items,$params)->label(false) ?>
        </div>
        <div class="uk-margin">
            <?= $form->field($model, 'description', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '3',
                    'placeholder' => 'Описание',
                    'class'=>'uk-textarea'
                ]
            ])->textarea(['rows' => 3, 'cols' => 20])->label(false) ?>
        </div>
        <div class="uk-margin">
            <?= $form->field($model, 'keywords', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '4',
                    'placeholder' => 'Ключевые слова',
                    'class'=>'uk-input'
                ]
            ])->label(false) ?>
        </div>
        <div class="uk-margin" uk-margin>
            <?= Html::submitButton('Сохранить', ['class' => 'uk-button uk-button-primary']) ?>
            <?= Html::a(
                'Удалить', 
                [
                    '/admin/category-delete', 'id' => $model->id
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
            <?= Html::a('Отмена', Url::to(['/admin/category']), ['class' => 'uk-button uk-button-default']) ?>
        </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
        
    </div>
</div>