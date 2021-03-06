<?php

use frontend\widgets\categoryList\CategoryList;

// @var $this yii\web\View
$this->title = 'Cart';
$this->registerMetaTag([
    'name' => 'Cart',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">
            
        <?= CategoryList::widget(); ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>
                    
                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, грн</th>
                                <th>Количество, шт</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['code'];?></td>
                                    <td>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['product/index', 'id' => $product['id']]); ?>">
                                            <?php echo $product['name'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price'];?></td>
                                    <td><?php echo $productsInCart[$product['id']];?></td>                        
                                    <td>
                                        <a class="btn btn-default checkout" href="<?php echo Yii::$app->urlManager->createUrl(['cart/delete', 'id' => $product['id']]); ?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>                        
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Общая стоимость, грн:</td>
                                    <td><?php echo $totalPrice;?></td>
                                </tr>
                            
                        </table>
                        
                        <a class="btn btn-primary" href="<?php echo Yii::$app->urlManager->createUrl(['cart/checkout',]);?>">Оформить заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                        
                        <a class="btn btn-primary" href="<?php echo Yii::$app->urlManager->createUrl(['/',]);?>">Вернуться к покупкам</a>
                    <?php endif; ?>
                </div>  
            </div>
            
        </div>
        
    </div>
</section>