<?php
/**
 * add to cart (modal)
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php if( !empty($session['cart']) ): ?>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider uk-table-striped">
            <thead>
                <tr>
                    <!--<th class="uk-table-shrink"></th>-->
                    <th class="uk-table-shrink uk-text-center">Картина</th>
                    <th class="uk-table-small uk-text-center">Артикул</th>
                    <th class="uk-table-shrink -uk-width-expand uk-text-center">Название</th>
                    <th class="uk-table-shrink uk-text-center">Автор</th>
                    <th class="uk-table-shrink uk-text-nowrap uk-text-center">Цена, руб.</th>
                    <th class="uk-table-expand uk-text-center">Описание</th>
                    <th class="uk-table-shrink uk-width-small uk-text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $session['cart'] as $id => $item): ?>
                <tr>
                    <!-- <td><input class="uk-checkbox" type="checkbox"></td> -->
                    <td><img class="uk-preserve-width -uk-border-circle" src="images/posters/<?= $item['image'] ?>" width="60" alt="<?= $item['name'] ?>"></td>
                    <td class="uk-text-nowrap"><?= $item['articul'] ?></td>
                    <td class="uk-table-link">
                        <a class="uk-link-reset uk-text-bolder" title="Изменить параметры картины" href="<?= Url::to([ 'poster', 'id' => $id ]) ?>"><i class="fas fa-edit uk-margin-small-right"></i><?= $item['name'] ?></a>
                    </td>
                    <td class="uk-text-nowrap uk-text-center uk-text-muted"><?= $item['autor'] ?></td>
                    <td class="uk-text-nowrap uk-text-center uk-text-bold"><?= $item['price'] ?></td>
                    <td class="uk-text-truncate uk-text-muted"><?= $item['text'] ?></td>
                    <td class="uk-text-nowrap uk-text-center"><button class="uk-button uk-button-small uk-button-danger" type="button" title="Удалить">x</button></td>
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