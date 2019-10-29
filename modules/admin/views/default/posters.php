<?php
use yii\helpers\Url;
use yii\helpers\Html;
/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;*/
use app\components\posterlistimage\PosterListImageWidget;
use app\modules\admin\components\posterscatalogmenu\PostersCatalogMenuWidget;
?>

<div class="uk-container uk-margin-large-bottom uk-margin-top">
    <h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>
    <div uk-grid>
        <aside class="uk-width-1-4@m  uk-margin-small-top" >
            <div class="aside-menu">
                <ul uk-accordion>
                    <?= PostersCatalogMenuWidget::widget()?>
                </ul>
            </div>
        </aside>
        <div class="uk-width-expand@m">
        <div class="uk-margin-bottom">
            <?= Html::a('<i class="fa fa-plus"></i> Добавить картину',Url::to(['/admin/poster-add']),['class' => 'uk-button uk-button-primary']) ?>
            <?= Html::a('<i class="fa fa-plus"></i> Добавить категорию',Url::to(['/admin/category-add']),['class' => 'uk-button uk-button-primary']) ?>
            <?= Html::a('<i class="fa fa-download"></i> Загрузить картины',Url::to(['/admin/posters-download']),['class' => 'uk-button uk-button-secondary']) ?>
        </div>
        
        <div class="uk-child-width-1-3 uk-text-center" uk-grid>
            <?php foreach( $posters as $poster): ?>
            <div>
                <div class="admin-holst-card uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                    <div class="">
                        <a href="<?= Url::to(['/admin/poster-edit', 'id' => $poster->poster->id]) ?>">
                            <?php echo PosterListImageWidget::widget([ 
                                'poster_id' => $poster->poster->id, 
                                'img_class' => '' ]
                            );?>
                        </a>
                    </div>
                    <h3 class="uk-card-title uk-padding-large-top uk-margin-top uk-margin-remove-bottom"><a href="<?= Url::to(['/admin/poster-edit', 'id' => $poster->poster->id]) ?>" class="uk-button uk-button-link"><?= $poster->poster->name ?></a></h3>
                    
                    <?php if($poster->poster->autor):?>
                        <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Автор <a href="#"><?= $poster->poster->autor ?></a></p>
                    <?php else: ?>
                        <p class="uk-text-small uk-margin-remove uk-margin-small-bottom"></p>
                    <?php endif; ?>
                    
                    <h4 class="uk-margin-small-top uk-margin-remove-bottom">Цена: <span><?= $poster->poster->price ?></span> руб.</h4>
                    <div class="--holst-card-block uk-padding-small uk-margin-remove">
                        <div class="uk-button-group">
                            <a href="<?= Url::to(['/admin/poster-edit', 'id' => $poster->poster->id]) ?>" class="uk-button uk-button-default uk-button-small" title="редактировать">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a href="<?= Url::to(['/poster/'.$poster->poster->id]) ?>" class="uk-button uk-button-default uk-button-small" title="смотреть на сайте">
                                <i class="fa fa-link"></i>
                            </a>
                            <?= Html::a(
                                '<i class="fa fa-times" title="Удалить '.$poster->poster->name.'"></i>', 
                                [
                                    '/admin/poster-delete', 'id' => $poster->poster->id
                                ], 
                                [
                                    'class' => 'uk-button uk-button-danger uk-button-small',
                                    'title' => 'Удалить "'.$poster->poster->name.'"',
                                    'data' => [
                                        'confirm' => 'Удалить "'.$poster->poster->name.'"?',
                                        'method' => 'post',
                                        ],
                                ]
                            ) ?>
                        </div>
                    </div>
                    
                    <p class="uk-text-small uk-margin-remove">Артикул <?= $poster->poster->articul ?> (id=<?= $poster->poster->id ?>)</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
        // выводим пагинацию с помощью встроенного в Yii виджета LinkPager
        /*echo yii\widgets\LinkPager::widget([
            'pagination' => $pages,
            'options' => [
                'class' => 'uk-pagination',
                'activePageCssClass' => 'active' ,
            ],
        ]);*/
        ?>
        <?php 
        /*$this->registerJs(
            '// "костыль" для активного пункта пагинации JQuery
            $(function() {
                $(".active").each(function() {
                    $(this).addClass("uk-active");
                });
            });',
            $this::POS_READY
        );*/
        ?>
        </div>
    </div>  <!-- end uk-grid -->
        
</div>