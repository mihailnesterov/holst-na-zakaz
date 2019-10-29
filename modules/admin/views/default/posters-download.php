<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\FileHelper;
/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;*/
?>

<div class="uk-container uk-margin-large-bottom uk-margin-top">
    <h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>

    <?php
        $path = 'images/download';
        $images = FileHelper::findFiles($path, ['only'=>['*.jpg','*.jpeg','*.png']]);
    ?>

    <div class="uk-margin-bottom">
        <div class="uk-margin" uk-margin>
            <div uk-form-custom="target: true">
                <span class="uk-form-icon" uk-icon="icon: download"></span>
                <input class="uk-input uk-form-width-large" type="text" placeholder="Каталог по умолчанию: <?= $path ?>" value="<?= $path ?>">
            </div>
            <?= Html::button('<i class="fa fa-download"></i> Загрузить', ['class' => 'uk-button uk-button-danger']) ?>
        </div>
    </div>
    
    <div class="uk-child-width-1-4 uk-text-center" uk-grid>
        <?php foreach($images as $image): ?>
            <div class="uk-margin">
                <div class="uk-card uk-card-default uk-card-body">
                <?php 
                    $filename = substr($image, strrpos(FileHelper::normalizePath($image, '/'), '/') + 1);
                ?>
                <p><?= Html::img($image,['alt' => $filename]) ?></p>
                <p><?= $filename ?></p>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>