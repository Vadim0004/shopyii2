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
                <th>Продукты</th>
            </tr>
            <?php foreach ($orders as $orderArray):?>
            <tr>
                <td><?php echo $orderArray['id'];?></td>
                <td><?php echo $orderArray['user_phone'];?></td>
                <td><?php echo $orderArray['user_comment'];?></td>
                <td><?php echo $orderArray['date'];?></td>
                <td><?php echo Order::getNameStatusOrder($orderArray['status']);?></td>
                <td>
                    <?php
                    // Получаем gson формат из Бд и переводим его в массив
                    $inArray = json_decode($orderArray['products'], true);
                    // Получаем массив с продутами в виде значений id продутов
                    
                    $arrayProducts = array_keys($inArray);

                    // Получаем массив товаров по номеру продуктов
                    $products = Product::getProdustsByIds($arrayProducts);

                    // перебираем массив и получаем из него значения и выводим в интерфейс
                    foreach ($products as $product) {
                        // Выодим имя продукта
                        echo 'Имя продукта' . ' ' . '<b>' . $product['name'] . '</b>' . '</br>';
                        // Уена за еденицу
                        echo 'Цена за еденицу' . ' ' . '<b>' . $product['price'] . '</b>' . '</br>';
                        // Количество едениц купленнго продукта
                        echo 'Количество едениц' . ' ' . '<b>' . $inArray[$product['id']] . '</b>' . '</br>';
                        // Выводим общую цену продукта с умножением на его количество
                        echo 'Общая цена купленных продуктов' . ' ' . '<b>' . Product::totalPriceProducts($inArray[$product['id']], $product['price']) . '</b>' . '</br>';
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        
        <a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/index');?>"><button class="btn btn-primary">Назад</button></a>
    </div>
</div>