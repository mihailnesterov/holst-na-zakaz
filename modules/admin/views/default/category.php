<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\admin\components\categorymenu\CategoryMenuWidget;
/*use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;*/
?>

<div class="uk-container uk-margin-large-bottom uk-margin-top">
    
    <h1 class="uk-heading-bullet uk-margin-top"><?= Html::encode($this->title) ?></h1>
        
    <div uk-grid>
        <aside class="uk-width-1-4@m  uk-margin-small-top" >
            <div class="aside-menu">
                <ul uk-accordion>
                    <?php echo CategoryMenuWidget::widget();?>
                </ul>
            </div>
        </aside>

        <div class="uk-width-expand@m">
            <div class="uk-margin-bottom">
                <?= Html::a('<i class="fa fa-plus"></i> Добавить категорию',Url::to(['/admin/category-add']),['class' => 'uk-button uk-button-primary']) ?>
                <?php if( $get_id = Yii::$app->request->get('id') ): ?>            
                    <?= Html::a('<i class="fa fa-edit"></i> Редактировать',Url::to(['/admin/category-edit','id' => $get_id]),['class' => 'uk-button uk-button-primary']) ?>
                <?php endif;?>
            </div>
            <?php if($model): ?>
            <div class="uk-child-width-1-3 uk-text-center" uk-grid>
                
                <?php foreach( $model as $cat): ?>
                <div>
                    <div class="admin-holst-card uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                        
                        <h3 class="uk-card-title">
                            <a href="<?= Url::to(['/admin/category-edit','id'=>$cat->id]) ?>">
                                <?php
                                    $postersInCategoryCount = $cat->getPostersInCategoryCount($cat->id);
                                    $subCategoryCount = $cat->getSubCategoryCount($cat->id);
                                ?>
                                <?= $cat->name ?> (<?= $subCategoryCount ?>)
                            </a>
                        </h3>
                        <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">id: <?= $cat->id ?></p>
                        <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Кол-во подкатегорий: <?= $subCategoryCount ?></p>
                        <p class="uk-text-small uk-margin-remove uk-margin-small-bottom">Кол-во картин: <?= $postersInCategoryCount ?></p>
                        
                        <div class="uk-padding-small uk-margin-remove">
                            <div class="uk-button-group uk-align-center">
                                <a href="<?= Url::to(['/admin/category-edit', 'id' => $cat->id]) ?>" class="uk-button uk-button-default uk-button-small" title="редактировать">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="<?= Url::to(['/category','id' => $cat->id]) ?>" class="uk-button uk-button-default uk-button-small" title="смотреть на сайте">
                                    <i class="fa fa-link"></i>
                                </a>
                                <?= Html::a(
                                    '<i class="fa fa-times" title="Удалить '.$cat->name.'"></i>', 
                                    [
                                        '/admin/category-delete', 'id' => $cat->id
                                    ], 
                                    [
                                        'class' => 'uk-button uk-button-danger uk-button-small uk-button uk-button-default',
                                        'title' => 'Удалить "'.$cat->name.'"',
                                        'disabled' => true,
                                        'style' => $postersInCategoryCount > 0 || $subCategoryCount > 0 ? 'pointer-events: none; cursor: default;opacity:0.7;' : 'opacity:1;',
                                        'data' => [
                                            'confirm' => 'Удалить "'.$cat->name.'"?',
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
            <?php else:?>
                <div class="uk-child-width-1-1 uk-text-center" uk-grid>
                    <h4>В данной категории нет подкатегорий</h4>
                </div>
            <?php endif;?>
        </div>

    </div>  <!-- end uk-grid -->
        

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