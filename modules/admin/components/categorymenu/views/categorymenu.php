<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<li class="uk-padding-remove">
    <ol>
        <?php foreach( $catalog as $item): ?>
            <?php
                $subCategories = $item->getSubCategories($item->id);
                $postersInCategoryCount = $item->getPostersInCategoryCount($item->id);
                $subCategoryCount = $item->getSubCategoryCount($item->id);
            ?>
            <li>
                <a href="<?= Url::to(['/admin/category','id'=>$item->id]) ?>">
                    <?= $item->name ?> (<?= $subCategoryCount ?>, <?= $postersInCategoryCount ?>)
                </a>
                
                <?php if($subCategories):?>
                <ol>
                    <?php foreach( $subCategories as $item): ?>
                        <li>
                            <?php
                                $postersInCategoryCount = $item->getPostersInCategoryCount($item->id);
                                $subCategoryCount = $item->getSubCategoryCount($item->id);
                            ?>
                            <a href="<?= Url::to(['/admin/category','id'=>$item->id]) ?>">
                                <?= $item->name ?> (<?= $subCategoryCount ?>, <?= $postersInCategoryCount ?>)
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <?php endif;?>
                
            </li>
        <?php endforeach; ?>
    </ol>
</li>