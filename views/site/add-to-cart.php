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
                    <th class="uk-table-shrink -uk-width-expand uk-text-center">Название / Параметры картины</th>
                    <th class="uk-table-shrink uk-text-nowrap uk-text-center">Цена, руб.</th>
                    <th class="uk-table-shrink uk-text-nowrap uk-text-center">Кол-во, шт.</th>
                    <th class="uk-table-shrink uk-text-nowrap uk-text-center">Сумма, руб.</th>
                    <th class="uk-table-shrink uk-width-small uk-text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $session['cart'] as $id => $item): ?>
                <tr>
                    <!-- <td><input class="uk-checkbox" type="checkbox"></td> -->
                    <td><img class="uk-preserve-width -uk-border-circle" src="images/posters/<?= $item['image'] ?>" width="70" alt="<?= $item['name'] ?>"></td>
                    <td class="uk-text-nowrap"><?= $item['articul'] ?></td>
                    <td class="uk-table-link">
                        <?php if( $item['name'] !== '' ):?>
                            <a class="uk-link-reset uk-text-bolder uk-margin-remove-bottom" 
                                title="Изменить размер, материал, выбрать багет, покрытие и т.д..." 
                                href="<?= Url::to([ 'poster', 'id' => $id ]) ?>">
                                <?= $item['name'] ?> 
                                <?php if( $item['autor'] !== '' ):?>
                                    <span class="uk-text-small uk-text-muted">
                                    ( Автор: <?= $item['autor'] ?> )
                                    </span>
                                <?php endif;?>
                            </a>
                        <?php endif;?>
                        <ul class="cart-poster-params uk-list uk-list-bullet uk-text-small <?= $item['name'] !== '' ? 'uk-margin-remove-top' : 'uk-margin-top' ?> uk-margin-remove-bottom">
                            <li>Размер: <span class="uk-text-bold">30х45</span> см</li>
                            <li>Материал: <span class="uk-text-bold">Холст натуральный</span></li>
                            <li>Толщина подрамника: <span class="uk-text-bold">2 см</span></li>
                        </ul>
                        <a 
                            href="<?= Url::to([ 'poster', 'id' => $id ]) ?>" 
                            class="uk-text-primary uk-margin-remove-top uk-margin-small-bottom uk-text-small"
                            title="Изменить размер, материал, выбрать багет, покрытие и т.д..."
                        >
                            <i class="fas fa-edit -uk-margin-small-right uk-text-danger"></i>
                            Изменить параметры картины
                        </a>
                    </td>
                    <td class="uk-text-nowrap uk-text-center"><?= $item['price'] ?></td>
                    <td class="uk-text-nowrap uk-text-center"><input class="uk-input uk-text-center" type="number" value="<?= $item['qty'] ?>"></td>
                    <td class="uk-text-nowrap uk-text-center uk-text-bold"><?php echo ($item['qty'] * $item['price']); ?></td>
                    <td class="uk-text-nowrap uk-text-center"><button class="uk-button uk-button-small uk-button-danger" type="button" title="Удалить">x</button></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="uk-text-center uk-padding uk-margin-auto-vertical">
        <h3 class="uk-text-center uk-padding-small uk-margin-remove-vertical">
            Корзина пуста...
        </h3>
    </div>
<?php endif; ?>