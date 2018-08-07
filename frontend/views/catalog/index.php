<?php
use frontend\models\repository\ProductRepository;
use frontend\widgets\categoryList\CategoryList;

// @var $this yii\web\View
$this->title = 'Catalog';
$this->registerMetaTag([
    'name' => 'Catalog',
    'content' => 'Catalog description',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <?= /* Список категорий */ CategoryList::widget(); ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>

                    <?php foreach ($latestProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        
                                        <img src="<?php echo ProductRepository::getImage($product['id']);?>" alt="" />
                                       
                                        
                                        <h2><?php echo $product->price; ?>$</h2>
                                        <p>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['product/index', 'id' => $product->id]); ?>">
                                                ID:<?php echo '# ' . $product->id . ' ';?><?php echo $product->name; ?>
                                            </a>
                                        </p>
                                        <a href="/frontend/web/cart/addAjax/<?php echo $product->id; ?>"
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

                <div class="recommended_items"><!--recommended_items-->
                    
                    <!-- Постраничная навигация -->
                    
                    
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div class="cycle-slideshow" 
                         data-cycle-fx=carousel
                         data-cycle-timeout=4000
                         data-cycle-carousel-visible=3
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-prev="#prev"
                         data-cycle-next="#next"
                         >                        
                             <?php foreach ($recomend as $sliderItem): ?>
                            <div class="item">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo ProductRepository::getImage($sliderItem['id']);?>"/>
                                            <h2>$<?php echo $sliderItem->price; ?></h2>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['product/index', 'id' => $sliderItem->id]); ?>">
                                                ID:<?php echo '# ' . $sliderItem->id . ' ';?><?php echo $product->name; ?>
                                            </a>
                                            <br/><br/>
                                            <a href="/frontend/web/cart/addAjax/<?php echo $sliderItem->id; ?>"
                                               class="btn btn-default add-to-cart" 
                                               data-id="<?php echo $sliderItem->id; ?>">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </a>
                                        </div>
                                        <?php if ($sliderItem->is_new): ?>
                                            <img src="/images/home/new.png" class="new" alt="" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                        <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        
                        <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        
                    </div>
                    
                </div><!--/recommended_items-->
            </div>
        </div>
    </div>

</section>