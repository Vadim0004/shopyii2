<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;
use yii\helpers\Html;

// @var $this yii\web\View
$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['/']); ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['category/index']); ?>">Управление категориями</a></li>
                    <li class="active">Отредактировать товар</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <?= Html::beginForm(); ?>

                <p><?= $formLabel['name']; ?></p>
                <?= Html::input('varchar', 'name', $category->name, ['class' => 'form-control']) . '<br>'?>
                <?php if ($modelCategory->hasErrors()): ?>
                    <?= Html::error($modelCategory, 'name', ['class' => 'alert alert-danger']) ?>
                <?php endif; ?>

                <p><?= $formLabel['sort_order']; ?></p>
                <?= Html::dropDownList('sort_order', $category->sort_order, [1 => 1, 2 => 2, 3 => 3, 4 => 4], ['class' => 'form-control']) . '<br>'; ?>

                <p><?= $formLabel['status']; ?></p>
                <?= Html::dropDownList('status', $category->status, [0 => 'Скрыт', 1 => 'Отображается'], ['class' => 'form-control']) . '<br>'; ?>

                <?php echo Html::submitButton('Отредактировать', ['class' => 'btn btn-default']); ?>

                <?= Html::endForm(); ?>
            </div>
        </div>
    </div>
</section>