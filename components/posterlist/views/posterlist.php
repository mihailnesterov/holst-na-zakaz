<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\posterlistimage\PosterListImageWidget;
?>
<div class="uk-container uk-margin-large-bottom">
<h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>
    <div class="uk-child-width-1-3 uk-text-center" uk-grid>
        <?php foreach( $posters as $poster): ?>
        <div>
            <div class="holst-card uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                <div class="container-3d">
                    <a href="<?= Url::to(['poster', 'id' => $poster->id]) ?>">
                        <?php echo PosterListImageWidget::widget([ 
                            'poster_id' => $poster->id, 
                            'img_class' => 'image-3d style-flat' ]
                        );?>
                    </a>
                </div>
                <h3 class="uk-card-title uk-padding-large-top uk-margin-top uk-margin-remove-bottom"><a href="<?= Url::to(['poster','id' => $poster->id]) ?>" class="uk-button uk-button-link"><?= $poster->name ?></a></h3>
                
                <?php if($poster->autor):?>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Автор <a href="<?= Url::to(['/search','q' => $poster->autor]) ?>"><?= $poster->autor ?></a></p>
                <?php else: ?>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom"></p>
                <?php endif; ?>
                
                <h4 class="uk-margin-small-top uk-margin-remove-bottom">от <span><?= $poster->price ?></span> руб.</h4>
                <div class="holst-card-block uk-padding-small uk-margin-remove">
                    <!--<button class="uk-button uk-margin-small-bottom"><i class="fa fa-shopping-cart uk-margin-small-right"></i>В корзину</button>-->
                    <?= Html::a(
                        '<i class="fa fa-shopping-cart uk-margin-small-right"></i>В корзину', 
                        [
                            'add-to-cart', 'id' => $poster->id
                        ], 
                        [
                            'class' => 'uk-button uk-margin-small-bottom add-to-cart-button',
                            'title' => 'Добавить в корзину "'.$poster->name.'"',
                            'data-id' => $poster->id,
                        ]
                    ) ?>
                    <a href="<?= Url::to(['poster','id' => $poster->id]) ?>" class="uk-button uk-button-default">Подробнее...</a>
                </div>
                
                <p class="uk-text-small uk-margin-remove">Артикул <?= $poster->articul ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php
    // выводим пагинацию с помощью встроенного в Yii виджета LinkPager
    echo yii\widgets\LinkPager::widget([
        'pagination' => $pages,
        'options' => [
            'class' => 'uk-pagination',
            'activePageCssClass' => 'active' ,
        ],
    ]);
    ?>
    <?php 
    $this->registerJs(
        '// "костыль" для активного пункта пагинации JQuery
        $(function() {
            $(".active").each(function() {
                $(this).addClass("uk-active");
            });
        });',
        $this::POS_READY
    );
    ?>
</div>
