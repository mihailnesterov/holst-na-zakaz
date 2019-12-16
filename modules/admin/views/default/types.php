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
            <?= Html::a('<i class="fa fa-plus"></i> Добавить тип',Url::to(['/admin/type-add']),['class' => 'uk-button uk-button-primary']) ?>
        </div>
        <div class="uk-child-width-1-4 uk-text-center" uk-grid>
            <?php foreach( $types as $type): ?>
            <div>
                <div class="admin-holst-card uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                    <h4 class="uk-margin-remove uk-margin-small-bottom"><?= $type->name ?></h4>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom"><?= $type->price ?> руб.</p>
                    
                    <div class="uk-padding-small uk-margin-remove">
                        <div class="uk-button-group">
                            <a href="<?= Url::to(['/admin/type-edit', 'id' => $type->id]) ?>" class="uk-button uk-button-default uk-button-small" title="редактировать">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <?= Html::a(
                                '<i class="fa fa-times" title="Удалить '.$type->name.'"></i>', 
                                [
                                    '/admin/type-delete', 'id' => $type->id
                                ], 
                                [
                                    'class' => 'uk-button uk-button-danger uk-button-small',
                                    'title' => 'Удалить "'.$type->name.'"',
                                    'data' => [
                                        'confirm' => 'Удалить "'.$type->name.'"?',
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