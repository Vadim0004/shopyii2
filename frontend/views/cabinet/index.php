<?php
use frontend\assets\MyShopAsset;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Cabinet';
$this->registerMetaTag([
    'name' => 'Cabinet',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <h1>Cabinet Customer</h1>
            <h3><?php echo 'Hello ' . $userData['name'];?></h3>
            <ul>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/edit');?>">Edit Data</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/history');?>">List of purchase</a></li>
            </ul>

        </div>
    </div>
</section>