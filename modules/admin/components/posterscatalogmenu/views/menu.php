<?php
use yii\helpers\Url;
?>

<div class="-catalog-menu">
    <ul uk-accordion>
        <li class="uk-open uk-padding-remove">
            <a class="uk-accordion-title" href="#"><h3>Картины <i class="fas fa-arrow-circle-right"></i></h3></a>
            <div class="uk-accordion-content">
                <ul>
                    <?php foreach( $catalog as $item): ?>
                        <li>
                            <a href="<?= Url::to(['/admin/posters?cat='.$item->catalog_id]) ?>"><?= $item->catalog->name ?> (<?= app\models\CatalogPosters::getCategoryCount($item->catalog_id) ?>)</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>
    </ul>
</div>