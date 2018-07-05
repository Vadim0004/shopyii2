<?php 

use frontend\models\repository\Productrepository;

?>

<div class="recommended_items"><!--recommended_items-->

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
                        <div itemscope itemtype="http://schema.org/Offer" class="productinfo text-center">
                            <img src="<?php echo Productrepository::getImage($sliderItem->id); ?>"/>
                            <span itemprop="price">$<?php echo $sliderItem->price; ?></span>
                            <span itemprop="name">
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['product/index', 'id' => $sliderItem->id]); ?>">
                                    ID:<?php echo '# ' . $sliderItem->id . ' '; ?><?php echo $sliderItem->name; ?>
                                </a>
                            </span>
                            <br/><br/>
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['cart/addajax', 'id' => $sliderItem->id]); ?>"
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