<?php

use frontend\models\Product;
use frontend\models\Order;
use frontend\assets\MyShopAsset;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Cabinet History';
$this->registerMetaTag([
    'name' => 'Cabinet History',
    'content' => 'description of the page',
]);
?>

<div class="container">
    <div class="row">
        <h4>Таблица заказов</h4>
        <table class="table-bordered table-striped table">
            <tr>
                <th>Номер заказа</th>
                <th>Номер телефона</th>
                <th>Коментарий к заказу</th>
                <th>Дата заказа</th>
                <th>Статус</th>
            </tr>
            <?php foreach ($orders as $orderArray):?>
            <tr>
                <td><?php echo $orderArray->id;?></td>
                <td><?php echo $orderArray->user_phone;?></td>
                <td><?php echo $orderArray->user_comment;?></td>
                <td><?php echo $orderArray->date;?></td>
                <td><?php echo Order::getNameStatusOrder($orderArray['status']);?></td>
            <?php endforeach;?>
            </tr>    
        </table>
        
                <?php foreach ($products as $idProduct => $product): ?>
                    <?php echo '<hr>' . '<b>Имя заказа</b>' . ' ' . '<b>' . $idProduct . '</b>' . '</br>' . '<hr>';?>
                    <?php foreach ($product as $productId ): ?>
                        <?php echo 'Имя продукта' . ' ' . '<b>' . $productId->name . '</b>' . '</br>'; ?>
                        <?php echo 'Цена за еденицу' . ' ' . '<b>' . $productId->price . '</b>' . '</br>'; ?>
                        <?php echo 'Количество едениц' . ' ' . '<b>' . $arrayProductsFromOrder[$idProduct][$productId->id] . '</b>' . '</br>'; ?>
                        <?php echo 'Общая цена купленных продуктов' . ' ' . '<b>' . Product::totalPriceProducts($arrayProductsFromOrder[$idProduct][$productId->id], $productId->price) . '</b>' . '</br>';?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        
        <a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/index');?>"><button class="btn btn-primary">Назад</button></a>
    </div>
</div>