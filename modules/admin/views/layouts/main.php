<?php
    use app\assets\AdminAsset;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use app\modules\admin\components\categorymenu\CategoryMenuWidget;
    use app\modules\admin\components\servicesmenu\ServicesMenuWidget;
    use app\modules\admin\components\bagetsmenu\BagetsMenuWidget;
    use app\modules\admin\components\topmenu\TopMenuWidget;

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl(Yii::$app->homeUrl.'web');   
   
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
        
        <?php AdminAsset::register($this); ?>
        
    </head>
    <body>
        <?php $this->beginBody(); ?>

        <!-- header -->
        <div class="main-headerbar">
            <h4 class="uk-margin-top uk-margin-right">
                Кабинет: 
            </h4>
            <?php echo TopMenuWidget::widget(['action' => Yii::$app->controller->action->id]);?>
            <h4 class="uk-margin-top uk-margin-left">
                <span class="--uk-form-icon" uk-icon="icon: user"></span>
                <?= Yii::$app->user->identity->login ?>
                 / 
                <a href="<?= Url::to('@web/admin/logout') ?>">выйти</a>
            </h4>
            <div class="main-headerbar-buttons">
                <!-- add hamburger here... -->
            </div>
            
        </div>
        
        <!-- content -->
        <div class="main-wrapper uk-container">
            <div class="content-container"> <!-- no css -->
                <?= $content ?>
            </div>
        </div>  <!-- end main-wrapper -->

        <!-- footer -->
        <footer class="main-footer">
            <div class="main-footer-pasta"></div>
                <div class="main-footer-copyright uk-text-center uk-background-default uk-padding">
                © Холст на заказ
                &nbsp;|&nbsp;
                <a href="<?= Url::to('index')?>">перейти на сайт</a>
                &nbsp;|&nbsp;
                <?php echo date('Y'); ?>
            </div>
        </footer>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
