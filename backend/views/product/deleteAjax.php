<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $products backend\controllers\ProductController array ActiveRecord*/

?>

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
<?php else: ?>
    <h4>Список категорий пуст</h4>
<?php endif; ?>