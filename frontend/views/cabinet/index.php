<?php

use frontend\assets\MyShopAsset;
use yii\helpers\Html;
use yii\helpers\Url;

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

            <?= Html::tag('h3', 'Личный кабинет'); ?>
            <?= Html::tag('h4', 'Привет ' . $userData->name); ?>
            <div class="row">
                <div class="col-sm-4">
                    <ul class="list-group">
                        <a href="<?php echo Url::to(['cabinet/edit']); ?>">
                            <li class="btn btn-primary">Отредактировать Данные</li>
                        </a><br>
                        <a href="<?php echo Url::to(['cabinet/history']); ?>">
                            <li class="btn btn-primary">Список покупок</li>
                        </a><br>
                        <?php if ($addressBook): ?>
                            <a href="<?php echo Url::to(['cabinet/editaddressbook']); ?>">
                                <li class="btn btn-primary">Редактировать личные данные</li>
                            </a><br>
                        <?php else: ?>
                            <a href="<?php echo Url::to(['cabinet/addaddressbook']); ?>">
                                <li class="btn btn-primary">Добавить личные данные</li>
                            </a><br>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>