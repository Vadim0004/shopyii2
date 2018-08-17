<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;
use frontend\models\repository\ProductRepository;

/* @var $this yii\web\View */
/* @var $categorys backend\controllers\CategoryController ActiveRecord*/

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

    <section>
        <div class="row">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['/']); ?>">Админпанель</a></li>
                    <li class="active">Управление категориями</li>
                </ol>
            </div>

            <a href="<?php echo Url::to(['category/create'])?>" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>

            <h4>Список категорий</h4>

            <br/>

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
                        <td><a href="<?php echo Url::to(['category/delete', 'id' => $category->id]); ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
    </section>