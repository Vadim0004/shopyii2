<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

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
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['site/index']) ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['product/index']) ?>">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>
            <h4>Добавить новый товар</h4>
            <br/>
            <div class="col-lg-6">
                <div class="login-form">
                    <?= Html::beginForm(['product/create'], 'post', ['enctype' => 'multipart/form-data']); ?>

                    <p><?= $formAttrLable['name']; ?></p>
                    <?= Html::activeInput('varchar', $modelProduct, 'name', ['class' => 'form-control']) . '<br>'; ?>
                    <?php if ($modelProduct->hasErrors()): ?>
                        <?= Html::error($modelProduct, 'name', ['class' => 'alert alert-danger']) ?>
                    <?php endif; ?>

                    <p><?= $formAttrLable['code']; ?></p>
                    <?= Html::activeInput('varchar', $modelProduct, 'code', ['class' => 'form-control']) . '<br>'; ?>
                    <?php if ($modelProduct->hasErrors()): ?>
                        <?= Html::error($modelProduct, 'code', ['class' => 'alert alert-danger']) ?>
                    <?php endif; ?>

                    <p><?= $formAttrLable['price']; ?></p>
                    <?= Html::activeInput('number', $modelProduct, 'price', ['class' => 'form-control']) . '<br>'; ?>
                    <?php if ($modelProduct->hasErrors()): ?>
                        <?= Html::error($modelProduct, 'price', ['class' => 'alert alert-danger']) ?>
                    <?php endif; ?>

                    <p><?= $formAttrLable['category']; ?></p>
                    <?= Html::activeDropDownList($modelProduct, 'category', ArrayHelper::map($category, 'id', 'name')) . '<br>' ?>
                    <br>

                    <p><?= $formAttrLable['brand']; ?></p>
                    <?= Html::activeInput('varchar', $modelProduct, 'brand', ['class' => 'form-control']) . '<br>'; ?>
                    <?php if ($modelProduct->hasErrors()): ?>
                        <?= Html::error($modelProduct, 'brand', ['class' => 'alert alert-danger']) ?>
                    <?php endif; ?>

                    <p>Изображение товара</p>
                    <?= Html::activeFileInput($model, 'image'); ?>

                    <p><?= $formAttrLable['description']; ?></p>
                    <?= Html::activeTextarea($modelProduct, 'description') . '<br>'; ?>
                    <?php if ($modelProduct->hasErrors()): ?>
                        <?= Html::error($modelProduct, 'description', ['class' => 'alert alert-danger']) ?>
                    <?php endif; ?>

                    <p><?= $formAttrLable['availability']; ?></p>
                    <?= Html::activeDropDownList($modelProduct, 'availability', [0 => 'Нет', 1 => 'Да']) . '<br>' ?>

                    <br/>
                    <p><?= $formAttrLable['is_new']; ?></p>
                    <?= Html::activeDropDownList($modelProduct, 'is_new', [0 => 'Нет', 1 => 'Да']) . '<br>' ?>
                    <br/><br/>
                    <p><?= $formAttrLable['is_recommended']; ?></p>
                    <?= Html::activeDropDownList($modelProduct, 'is_recommended', [0 => 'Нет', 1 => 'Да']) . '<br>' ?>
                    <br/><br/>
                    <p><?= $formAttrLable['status']; ?></p>
                    <?= Html::activeDropDownList($modelProduct, 'status', [0 => 'Скрыт', 1 => 'Отображается']) . '<br>' ?>
                    <br/><br/>


                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
                    <?= Html::endForm(); ?>
                </div>
            </div>
        </div>
    </div>
</section>