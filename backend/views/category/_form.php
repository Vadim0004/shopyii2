<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $formLabel backend\controllers\CategoryController array */

?>

<div class="col-sm-6">
    <?= Html::beginForm(); ?>

    <p><?= $formLabel['name']; ?></p>
    <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control']) . '<br>'; ?>
    <?php if ($model->hasErrors()): ?>
        <?= Html::error($model, 'name', ['class' => 'alert alert-danger']) ?>
    <?php endif; ?>

    <p><?= $formLabel['sort_order']; ?></p>
    <?= Html::activeDropDownList($model, 'sort_order', [1 => 1, 2 => 2, 3 => 3, 4 => 4], ['class' => 'form-control']) . '<br>' ?>

    <p><?= $formLabel['status']; ?></p>
    <?= Html::activeDropDownList($model, 'status', [0 => 'Скрыт', 1 => 'Отображается'], ['class' => 'form-control']) . '<br>' ?>

    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-default']); ?>

    <?= Html::endForm(); ?>
</div>