<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav uk-subnav uk-subnav-pill uk-margin-top top-menu-nav">
            <?php for($i=0;$i<count($items);$i++) { ?>
                <?php if(count($items[$i]) == count($items[$i], COUNT_RECURSIVE)) { ?>
                    <?php if ( $action == $items[$i]['action'] ):?>
                    <li class="uk-active"><a href="<?= Url::to([$items[$i]['url']]) ?>"><?= $items[$i]['title'] ?></a></li>
                    <?php else: ?>
                        <li><a href="<?=Url::to([$items[$i]['url']]) ?>"><?= $items[$i]['title'] ?></a></li>
                    <?php endif; ?>
                <?php } else { ?>
                    <li>
                        <a href="#"><?= $items[$i]['title'] ?></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <?php foreach( array_keys( $items[$i] ) as $index=>$key ): ?>
                                    <?php if($index > 0): ?>
                                        <li><a href="<?=Url::to([$items[$i][$key]['url']]) ?>"><?= $items[$i][$key]['title'] ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?> 
            <?php } ?>
        </ul>
    </div>
</nav>

