<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $userByOrder backend\controllers\OrderController array ActiveRecord*/

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<div class="container">
    <div class="row">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?php echo Url::to(['/'])?>">Админпанель</a></li>
                <li class="active">Управление заказвми</li>
            </ol>
        </div>

        <a href="/admin/" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить заказ</a>
        <?php if ($userByOrder): ?>
        <h4>Список заказов</h4>

        <br/>

        <table class="table-bordered table-striped table">
            <tr>
                <th>Номер заказа</th>
                <th>Id пользователя</th>
                <th>Продукты</th>
                <th>Общая стоимость</th>
                <th>Коментарий пользователя</th>
                <th>Дата заказа</th>
                <th>Просмотр</th>
                <th>Редактирование</th>
                <th>Удаление</th>
            </tr>
                <?php foreach ($userByOrder as $ordersItem):?>
            <tr>
                <td><?php echo $ordersItem->productOrdersById[0]->id; ?></td>
                <td><?php echo $ordersItem->name; ?></td>
                <td>
                <?php foreach ($ordersItem->productOrdersById[0]->products as $productValue): ?>
                    <?php echo $productValue['name'] . '<br>'; ?>
                    <b><?php echo ' - цена ' . $productValue['price'] . '<br>'; ?></b>
                <?php endforeach; ?>
                </td>
                <td>
                    <?php echo 'Цена - ' . '<b>' . $ordersItem->productOrdersById[0]->value . '</b>'; ?>
                </td>
                <td><?php echo $ordersItem->productOrdersById[0]->user_comment; ?></td>
                <td><?php echo $ordersItem->productOrdersById[0]->date; ?></td>
                <td><a href="<?php echo Url::to(['order/view', 'id' => $ordersItem->productOrdersById[0]->id])?>" title="Отображение"> <i class="fa fa-eye"></i></a></td>
                <td><a href="<?php echo Url::to(['order/update', 'id' => $ordersItem->id]); ?>" title="Редактировать" ><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="<?php echo Url::to(['order/delete', 'id' => $ordersItem->id]); ?>" title="Удалить"><i class="fa fa-times"></a></td>
            </tr>
            <?php endforeach;?>
        </table>
        <?php endif; ?>
    </div>
</div>