<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */

?>
    <div style="margin: 0 auto; max-width: 480px;">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'login', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'tabindex' => '1',
                    'placeholder' => 'Логин',
                    'class'=>'',
                    //'pattern'=>'\D+([a-zA-Z0-9._@])$'
                ]
            ])->label(false) ?>


            <?= $form->field($model, 'password', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '2',
                    'placeholder' => 'Пароль',
                    'class'=>''
                ]
            ])->passwordInput()->label(false) ?>

            <?= $form->field($model, 'rememberMe', [
                'template' => '{input}{error}',
                'inputOptions' => [
                    'tabindex' => '3',
                    'class'=>''
                ]
            ])->checkbox(['value' => 0, 'checked' => false]) ?>

            <div>
                <?= Html::submitButton('Войти', ['class' => '']) ?>
            </div>
        <?php ActiveForm::end(); ?>

        <div>
            У меня нет аккаунта <a href="<?=Yii::$app->urlManager->createUrl(['/admin/signup'])?>" >Регистрация</a>
        </div>

        <div>
            <a href="<?=Yii::$app->urlManager->createUrl(['/admin/password-restore'])?>" >Забыли пароль?</a>
        </div>

    </div>