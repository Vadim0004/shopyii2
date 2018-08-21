<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\repository\ProductRepository;

/* @var $categorys backend\controllers\CategoryController ActiveRecord*/

?>
<?php if ($categorys): ?>
<table class="table-bordered table-striped table">
    <tr>
        <th>ID товара</th>
        <th>Название товара</th>
        <th>Сортировка</th>
        <th>Отображение</th>
        <th>Редактирвоание</th>
        <th>Удаление</th>
    </tr>
    <?php foreach ($categorys as $category): ?>
        <tr>
            <td><?php echo $category->id; ?></td>
            <td><?php echo $category->name; ?></td>
            <td><?php echo $category->sort_order; ?></td>
            <td><?php echo ProductRepository::getNameProductStatus($category->status); ?></td>
            <td><a href="<?php echo Url::to(['category/update', 'id' => $category->id]); ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><?= Html::checkbox("category_id[]", false, ['value' => "$category->id"]); ?></td>
            <!--<td><a href="<?php echo Url::to(['category/delete', 'id' => $category->id]); ?>" title="Удалить"><i class="fa fa-times"></i></a></td>-->
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <h4>Список категорий пуст</h4>
    <?php endif; ?>
</table>