<?php

use frontend\assets\MyShopAsset;
use frontend\models\Product;
use frontend\widgets\categoryList;

MyShopAsset::register($this);

$this->registerJsFile('@web/js/myFooter.js', ['depends' => [
        MyShopAsset::className()
]]);

// @var $this yii\web\View
$this->title = 'Category';
$this->registerMetaTag([
    'name' => 'Category',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">
            
            <?= /* Список категорий */ categoryList\CategoryList::widget(); ?>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    
                    <?php foreach ($categoryProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo Product::getImage($product->id) ;?>" alt="" />
                                        <h2><?php echo $product->price ;?>$</h2>
                                        <p>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['product/index', 'id' => $product->id]) ;?>">
                                                <?php echo '#' . $product->id . ' ' . $product->name ;?>
                                            </a>
                                        </p>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['cart/addajax', 'id' => $product->id]) ;?>"
                                           data-id ="<?php echo $product->id; ?>"
                                           class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину
                                        </a>
                                    </div>
                                    
                                    <?php if ($product->is_new): ?>
                                    <img src="/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div><!--features_items-->
                <!-- Постраничная навигация -->
                <?php echo $pagination->get(); ?>


            </div>
        </div>
        
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-9">
                    <a href="<?php echo Yii::$app->urlManager->createUrl(['catalog/index',]);?>" class="btn btn-primary">Назад</a>
                </div>
            </div>
        
    </div>
</section>
