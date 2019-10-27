<?php
use yii\helpers\Url;
use yii\helpers\Html;
/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;*/
?>

<div class="uk-container uk-margin-large-bottom uk-margin-top">
    <h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>
        <div class="uk-margin-bottom">
            <?= Html::a('<i class="fa fa-plus"></i> Добавить багет',Url::to(['/admin/baget-add']),['class' => 'uk-button uk-button-primary']) ?>
        </div>
        <div class="uk-child-width-1-3 uk-text-center" uk-grid>
            <?php foreach( $bagets as $baget): ?>
            <div>
                <div class="admin-holst-card uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                    <div class="uk-margin-bottom">
                        <a href="<?= Url::to(['/admin/baget-edit', 'id' => $baget->id]) ?>">
                            <?= Html::img('@web/images/baguettes/'.$baget->image,['alt' => "$baget->articul"]) ?>
                        </a>
                    </div>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Артикул: <?= $baget->articul ?></p>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Материал: <?= $baget->material ?></p>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Толщина: <?= $baget->width ?> см</p>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Цвет: <?= $baget->color ?></p>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Цена: <?= $baget->price ?> руб.</p>
                    
                    
                    <div class="--holst-card-block uk-padding-small uk-margin-remove">
                        <div class="uk-button-group">
                            <a href="<?= Url::to(['/admin/baget-edit', 'id' => $baget->id]) ?>" class="uk-button uk-button-default uk-button-small" title="редактировать">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <?= Html::a(
                                '<i class="fa fa-times" title="Удалить '.$baget->articul.'"></i>', 
                                [
                                    '/admin/baget-delete', 'id' => $baget->id
                                ], 
                                [
                                    'class' => 'uk-button uk-button-danger uk-button-small',
                                    'title' => 'Удалить "'.$baget->articul.'"',
                                    'data' => [
                                        'confirm' => 'Удалить "'.$baget->articul.'"?',
                                        'method' => 'post',
                                        ],
                                ]
                            ) ?>
                        </div>
                    </div>
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