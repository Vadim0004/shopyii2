<?php
use frontend\assets\MyShopAsset;
use frontend\models\Product;

MyShopAsset::register($this);

$this->registerJsFile('@web/js/myFooter.js', ['depends' => [
        MyShopAsset::className()
]]);

// @var $this yii\web\View
$this->title = 'Product';
$this->registerMetaTag([
    'name' => 'Product',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">
                        <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['syte/category', 'categoryId' => $categoryItem['id']]);?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo Product::getImage($product['id']);?>" alt="" />
                                <?php //var_dump(Product::getImage($product['id']));die;?>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="/frontend/web/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2><?php echo $product['name'];?></h2>
                                <p>Код товара: <?php echo $product['code'];?></p>
                                <span>
                                    <span>US $<?php echo $product['price'];?></span>
                                    <label>Количество:</label>
                                    <input type="text" value="1"/>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['cart/addajax', 'id' => $product['id']]);?>"
                                       data-id ="<?php echo $product['id']; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </a>
                                </span>
                                <p><b>Наличие:</b> На складе</p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> D&amp;G</p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <?php echo $product['description'];?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-9">
                <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-primary">Назад</a>
            </div>
        </div>
        
    </div>
</section>