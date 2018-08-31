<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $order backend\controllers\OrderController array ActiveRecord */

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

        <?php if ($order): ?>
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
                <th>Редактирование</th>
                <th>Удаление</th>
            </tr>
            <tr>
                <td><?= $order->id ?></td>
                <td><?= $order->user_name ?></td>
                <td>
                    <?php foreach ($order->products as $product): ?>
                        <?php echo $product['name'] . '<br>'; ?>
                        <?php echo '<b>' . 'Цена - ' . $product['price'] . '</b>' . '<br>'; ?>
                    <?php endforeach; ?>
                </td>
                <td><?= $order->value ?></td>
                <td><?= $order->user_comment ?></td>
                <td><?= $order->date ?></td>
                <td><a href="<?php echo Url::to(['order/update', 'id' => $order->id]); ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="<?php echo Url::to(['order/delete', 'id' => $order->id]); ?>" title="Удалить"><i class="fa fa-times"></a></td>
            </tr>
        </table>

        <?php endif; ?>
    </div>
</div>