<?php
/**
 * add to cart (modal)
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php if( !empty($session['cart']) ): ?>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
                <tr>
                    <th class="uk-table-shrink"></th>
                    <th class="uk-table-shrink">Preserve</th>
                    <th class="uk-table-expand">Expand + Link</th>
                    <th class="uk-width-small">Truncate</th>
                    <th class="uk-table-shrink uk-text-nowrap">Shrink + Nowrap</th>
                    <th class="uk-table-shrink uk-text-nowrap uk-text-center"><i class="fa fa-close"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $session['cart'] as $id => $item): ?>
                <tr>
                    <td><input class="uk-checkbox" type="checkbox"></td>
                    <td><img class="uk-preserve-width uk-border-circle" src="images/posters/<?= $item['image'] ?>" width="40" alt="<?= $item['name'] ?>"></td>
                    <td class="uk-text-nowrap"><?= $item['articul'] ?></td>
                    <td class="uk-table-link">
                        <a class="uk-link-reset" href="<?= Url::to([ 'poster', 'id' => $id ]) ?>"><?= $item['name'] ?></a>
                    </td>
                    <td class="uk-text-nowrap"><?= $item['autor'] ?></td>
                    <td class="uk-text-nowrap"><?= $item['price'] ?></td>
                    <td class="uk-text-truncate"><?= $item['text'] ?></td>
                    <td class="uk-text-nowrap"><button class="uk-button uk-button-default" type="button"><i class="fa fa-close"></i></button></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="uk-text-center uk-padding uk-margin-auto-vertical">
        <h3 class="uk-text-center uk-padding">
            Ваша корзина пуста...
        </h3>
        <a href="<?= Url::to('index') ?>" class="uk-button uk-text-primary">
            Перейти в каталог
        </a>
    </div>
<?php endif; ?>