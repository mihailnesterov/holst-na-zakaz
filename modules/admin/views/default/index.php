<?php
use yii\helpers\Html;
?>

<div>
        <h1><?= Html::encode($this->title) ?></h1>
        <p><?= $model->login ?></p>
        <?php if($model->role !== 'admin'): ?>
                <p>Вы не являетесь администратором!</p>
        <?php endif; ?>
</div>