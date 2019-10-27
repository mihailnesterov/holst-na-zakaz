<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<nav class="-uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="-uk-navbar-nav uk-subnav uk-subnav-pill uk-margin-top">
            <?php for($i=0;$i<count($items);$i++) { ?>
                <?php if ( $action == $items[$i]['action'] ):?>
                    <li class="uk-active"><a href="<?= Url::to([$items[$i]['url']]) ?>"><?= $items[$i]['title'] ?></a></li>
                <?php else: ?>
                    <li><a href="<?=Url::to([$items[$i]['url']]) ?>"><?= $items[$i]['title'] ?></a></li>
                <?php endif; ?>
            <?php } ?>            
            <!--<li>
                <a href="#">Parent</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Item</a></li>
                    </ul>
                </div>
            </li>-->
        </ul>

    </div>
</nav>

