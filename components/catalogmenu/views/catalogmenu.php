
<div class="catalog-menu">
    <ul uk-accordion>
        <li class="uk-open">
            <a class="uk-accordion-title" href="#"><h3>Картины <i class="fas fa-ad"></i></h3></a>
            <div class="uk-accordion-content">
                <ul>
                    <?php foreach( $catalog as $item): ?>
                        <li>
                            <a href="#"><?= $item->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title" href="#"><h3>Модульные картины <i class="fas fa-ad"></i></h3></a>
            <div class="uk-accordion-content">
                <ul>
                    <?php foreach( $catalog as $item): ?>
                        <li>
                            <a href="#"><?= $item->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>
    </ul>
</div>