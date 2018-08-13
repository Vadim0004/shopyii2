<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;

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
            <div class="col-sm-4">
                <br/>
                <h4>Добрый день, администратор!</h4>
                <br/>
                <p>Вам доступны такие возможности:</p>
                <br/>
                <ul class="list-group">
                    <a href="<?php echo Url::to(['product/index']); ?>">
                        <li class="list-group-item">Управление товарами</li>
                    </a>
                    <a href="<?php echo Url::to(['category/index']); ?>">
                        <li class="list-group-item">Управление категориями</li>
                    </a>
                    <a href="<?php echo Url::to(['order/index']); ?>">
                        <li class="list-group-item">Управление заказами</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</section>