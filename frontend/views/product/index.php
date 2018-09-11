<?php
use frontend\assets\MyShopAsset;
use frontend\models\repository\ProductRepository;
use frontend\widgets\categoryList\CategoryList;

MyShopAsset::register($this);

$this->registerJsFile('@web/js/myFooter.js', ['depends' => [
        MyShopAsset::className()
]]);

// @var $this yii\web\View
$this->title = 'ProductForm';
$this->registerMetaTag([
    'name' => 'ProductForm',
    'content' => 'ProductForm description',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <?= /* Список категорий */ CategoryList::widget(); ?>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo ProductRepository::getImage($product->id) ;?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                
                                <?php if ($product->is_new): ?>
                                        <img src="/images/home/new.png" class="new" alt="" />
                                <?php endif; ?>
                                        
                                <h2><?php echo $product->name; ?></h2>
                                <p>Код товара: <?php echo $product->code ;?></p>
                                <span>
                                    <span>US $<?php echo $product->price ;?></span>
                                    <label>Количество:</label>
                                    <input type="text" value="1"/>
                                    <a href="<?php echo Yii::$app->urlManager->createUrl(['cart/addajax', 'id' => $product->id]);?>"
                                       data-id ="<?php echo $product->id; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </a>
                                </span>
                                <p><b>Наличие: </b><?php echo ProductRepository::getNameProductAvailability($product->availability); ?></p>
                                <?php if ($product->is_new): ?>
                                <p><b>Состояние: </b><?php echo ProductRepository::getNameProductNew($product->is_new); ?></p>
                                <?php endif; ?>
                                <p><b>Производитель: </b><?php echo $product->brand; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <?php echo $product->description; ?>
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