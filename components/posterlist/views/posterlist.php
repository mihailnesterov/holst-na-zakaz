<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\posterlistimage\PosterListImageWidget;

//$this->title = 'view';
/*$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'keys...view'
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'description...view'
]);*/

?>
<div class="uk-container uk-margin-large-bottom">
    <div class="uk-child-width-1-3 uk-text-center" uk-grid>
        <?php foreach( $posters as $poster): ?>
        <div>
            <div class="holst-card uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                <?php echo PosterListImageWidget::widget([ 'poster_id' => $poster->id ]);?>
                <h3 class="uk-card-title uk-padding-large-top uk-margin-top uk-margin-remove-bottom"><a href="<?= Url::to(['poster','id' => $poster->id]) ?>" class="uk-button uk-button-link"><?= $poster->name ?></a></h3>
                
                <?php if($poster->autor):?>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Автор <a href="#"><?= $poster->autor ?></a></p>
                <?php else: ?>
                    <p class="uk-text-small uk-margin-remove uk-margin-small-bottom"></p>
                <?php endif; ?>
                
                <h4 class="uk-margin-small-top uk-margin-remove-bottom">от <?= $poster->price ?> руб.</h4>
                <div class="holst-card-block uk-padding-small uk-margin-remove">
                    <button class="uk-button uk-margin-small-bottom"><i class="fa fa-shopping-cart uk-margin-small-right"></i>В корзину</button>
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

    <!--<ul class="uk-pagination uk-margin-large-bottom" uk-margin>
        <li><a href="#"><span uk-pagination-previous></span></a></li>
        <li><a href="#">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li class="uk-active"><span>7</span></li>
        <li><a href="#">8</a></li>
        <li><a href="#">9</a></li>
        <li><a href="#">10</a></li>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="#">20</a></li>
        <li><a href="#"><span uk-pagination-next></span></a></li>
    </ul>-->
</div>
