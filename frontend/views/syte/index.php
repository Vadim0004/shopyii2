<?php

use frontend\assets\MyShopAsset;
use frontend\models\repository\ProductRepository;
use frontend\widgets\categoryList\CategoryList;
use frontend\widgets\recommendProductsList\RecommendProductsList;
use frontend\widgets\galleryImages\GalleryImages;
use yii\widgets\LinkPager;

MyShopAsset::register($this);

$this->registerJsFile('@web/js/myFooter.js', ['depends' => [
        MyShopAsset::className()
]]);

// @var $this yii\web\View
$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="container">
        <div class="row">
            <?php /* Слайдер */ /*GalleryImages::widget(); */ ?>
            <?= /* Список категорий */ CategoryList::widget(); ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>

                        <?php foreach ($products as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div itemscope itemtype="http://schema.org/Offer" class="productinfo text-center">

                                        <img src="<?php echo ProductRepository::getImage($product->id); ?>" alt="" />


                                        <h2 itemprop="price"><?php echo $product->price; ?>$</h2>
                                        <span itemprop="name">
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['product/index', 'id' => $product->id]); ?>">
                                                ID:<?php echo '# ' . $product->id . ' '; ?><?php echo $product->name; ?>
                                            </a>
                                        </span>
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['cart/addajax', 'id' => $product->id]); ?>"
                                           data-id ="<?php echo $product->id; ?>"
                                           class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart">        
                                            </i>
                                            В корзину
                                        </a>
                                    </div>
                                    <?php if ($product->is_new): ?>
                                        <img src="/images/home/new.png" class="new" alt="" />
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>


                </div><!--features_items-->
                
                <!-- Постраничная навигация -->
                <?= LinkPager::widget(['pagination' => $pages,]); ?>
                
                <?= /* Список категорий */ RecommendProductsList::widget(); ?>
                
            </div>
        </div>
    </div>

</section>