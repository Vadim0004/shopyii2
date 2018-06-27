<?php

/* @var $this \yii\web\View */
/* @var $content string */
use frontend\models\Cart;
use frontend\models\User;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    
    <div class="wrap">
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +38 099 000 00 0</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> shop@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?php echo Yii::$app->urlManager->createUrl('syte/index'); ?>"><img src="/images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php if (User::isGuest()): ?>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/index'); ?>"><i class="fa fa-user"></i> Аккаунт</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('user/logout'); ?>"><i class="fa fa-unlock"></i> Выход</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('cart/index'); ?>"><i class="fa fa-shopping-cart"></i> 
                                                Корзина
                                                <span id = "cart-count">(<?php echo Cart::countItems(); ?>)</span>
                                            </a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl('user/login'); ?>"><i class="fa fa-lock"></i> Вход</a></li>
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl('cart/index'); ?>"><i class="fa fa-shopping-cart"></i> 
                                                Корзина
                                                <span id = "cart-count">(<?php echo Cart::countItems(); ?>)</span>
                                            </a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('syte/index'); ?>">Главная</a></li>
                                    <li class="dropdown"><a href="<?php echo Yii::$app->urlManager->createUrl('syte/index'); ?>">Магазин<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="<?php echo Yii::$app->urlManager->createUrl('catalog/index'); ?>">Каталог товаров</a></li>
                                            <li><a href="<?php echo Yii::$app->urlManager->createUrl('cart/index'); ?>">Корзина</a></li> 
                                        </ul>
                                    </li> 
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('blog/index'); ?>">Блог</a></li> 
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('site/about'); ?>">О магазине</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('syte/contact'); ?>">Контакты</a></li>
                                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('user/register'); ?>">Регистрация в магазине</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
            <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
            </div> 
    </div>
    
<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <?php echo date("Y"); ?></p>
                <p class="pull-right">My php Shop</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>