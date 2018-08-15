<?php

use backend\assets\AdminAsset;
use frontend\models\repository\ProductOrderRepository;

AdminAsset::register($this);

use yii\helpers\Url;

// @var $this yii\web\View
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

        <h4>Список заказов</h4>

        <br/>

        <table class="table-bordered table-striped table">
            <tr>
                <th>Номер заказа</th>
                <th>Id пользователя</th>
                <th>Продукты</th>
                <th>Коментарий пользователя</th>
                <th>Дата заказа</th>
                <th>Просмотр</th>
                <th>Редактирование</th>
                <th>Удаление</th>
            <tr>
                <?php foreach ($userByOrder as $oredersItem):?>
                <?php foreach ($oredersItem->productOrdersById as $item): ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $oredersItem->name; ?></td>
                <td><?php echo $item->products; ?></td>
                <td><?php echo $item->user_comment; ?></td>
                <td><?php echo $item->date; ?></td>
                <td><a href="<?php echo Url::to(['order/view', 'id' => $oredersItem->id])?>" title="Отображение"> <i class="fa fa-eye"></i></a></td>
                <td><a href="<?php echo Url::to(['order/update', 'id' => $oredersItem->id]); ?>" title="Редактировать" ><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="<?php echo Url::to(['order/delete', 'id' => $oredersItem->id]); ?>" title="Удалить"><i class="fa fa-times"></a></td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach;?>
        </table>
    </div>
</div>