<?php

use backend\assets\AdminAsset;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $products backend\controllers\ProductController array ActiveRecord*/

AdminAsset::register($this);

$this->registerJsFile('@web/js/product/deleteProduct.js', ['depends' => [
    AdminAsset::className()
]]);
$this->registerJs(
    "var url = ".\yii\helpers\Json::htmlEncode($url).";",
    View::POS_HEAD,
    'url'
);

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
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['/'])?>">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="<?php echo Url::to(['product/create'])?>" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>

            <h4>Список товаров</h4>

            <br/>
            <?php if ($products): ?>
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th>Описание товара</th>
                    <th>Редактирвоание</th>
                    <th>Удаление</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product->id; ?></td>
                        <td><?php echo $product->code; ?></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->price; ?></td>
                        <td><?php echo $product->description; ?></td>
                        <td><a href="<?php echo Url::to(['product/update', 'id' => $product->id]); ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><?= Html::checkbox("product_id[]", false, ['value' => "$product->id"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?= Html::submitButton('Delete', ['class' => 'btn btn-primary']) ?><br><br>
            <?= LinkPager::widget(['pagination' => $pages,]); ?>
            <?php else: ?>
                <h4>Список категорий пуст</h4>
            <?php endif; ?>
        </div>
    </div>
</section>