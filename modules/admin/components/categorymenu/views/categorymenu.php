<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<li class="uk-open uk-padding-remove">
    <a class="uk-accordion-title" href="#"><h4><i class="fa fa-folder"></i> <?= Html::encode($this->title) ?></h4></a>
    <div class="uk-accordion-content">
        <?= Html::a('<i class="fa fa-plus"></i> Добавить',Url::to(['/admin/category-add']),['class' => 'uk-button uk-button-primary']) ?>
        <ol>
            <?php foreach( $catalog as $item): ?>
                <li>
                    <a href="<?= Url::to(['/admin/category-edit','id'=>$item->id]) ?>"><?= $item->name ?></a>
                </li>
            <?php endforeach; ?>
        </ol>
        
    </div>
</li>