<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<li class="-uk-open uk-padding-remove">
    <a class="uk-accordion-title" href="#"><h4><i class="fa fa-folder"></i> <?= Html::encode($this->title) ?></h4></a>
    <div class="uk-accordion-content">
        <?= Html::a('<i class="fa fa-plus"></i> Добавить',Url::to(['/admin/baget-add']),['class' => 'uk-button uk-button-primary']) ?>
        <ol>
            <?php foreach( $bagets as $item): ?>
                <li>
                    <a href="<?= Url::to(['/admin/baget-edit','id'=>$item->id]) ?>"><?= $item->articul ?> <?= $item->material ?></a>
                </li>
            <?php endforeach; ?>
        </ol>
        
    </div>
</li>
