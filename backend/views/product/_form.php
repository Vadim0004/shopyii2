<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\repository\ProductRepository;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $formAttrLable backend\controllers\ProductController array */
/* @var $category backend\controllers\ProductController ActiveRecord */
/* @var $product backend\controllers\ProductController ActiveRecord */
/* @var $modelImage backend\models\UploadForm ActiveRecord */

?>

<div class="col-sm-6">
    <?= Html::beginForm('', 'post', ['enctype' => 'multipart/form-data']); ?>

    <p><?= $formAttrLable['name']; ?></p>
    <?= Html::activeInput('text', $model, 'name', ['class' => 'form-control']) . '<br>'; ?>
    <?php if ($model->hasErrors()): ?>
        <?= Html::error($model, 'name', ['class' => 'alert alert-danger']) ?>
    <?php endif; ?>

    <p><?= $formAttrLable['code']; ?></p>
    <?= Html::activeInput('text', $model, 'code', ['class' => 'form-control']) . '<br>'; ?>
    <?php if ($model->hasErrors()): ?>
        <?= Html::error($model, 'code', ['class' => 'alert alert-danger']) ?>
    <?php endif; ?>

    <p><?= $formAttrLable['price']; ?></p>
    <?= Html::activeInput('number', $model, 'price', ['class' => 'form-control']) . '<br>'; ?>
    <?php if ($model->hasErrors()): ?>
        <?= Html::error($model, 'price', ['class' => 'alert alert-danger']) ?>
    <?php endif; ?>

    <p><?= $formAttrLable['category_id']; ?></p>
    <?= Html::activeDropDownList($model, 'category_id', ArrayHelper::map($category, 'id', 'name'), ['class' => 'form-control']); ?>
    <br>

    <p><?= $formAttrLable['brand']; ?></p>
    <?= Html::activeInput('text', $model, 'brand', ['class' => 'form-control'], ['class' => 'form-control']) . '<br>'; ?>
    <?php if ($model->hasErrors()): ?>
        <?= Html::error($model, 'brand', ['class' => 'alert alert-danger']) ?>
    <?php endif; ?>

    <p>Изображение товара</p>
    <?php if ($product): ?>
    <img src="<?php echo ProductRepository::getImage($product->id) ?>" width="200" alt=""/>
    <?php endif; ?>
    <?= Html::activeFileInput($modelImage, 'image', ['class' => 'form-control']); ?>

    <p><?= $formAttrLable['description']; ?></p>
    <?= Html::activeTextarea($model, 'description', ['class' => 'form-control']); ?>
    <?php if ($model->hasErrors()): ?>
        <?= Html::error($model, 'description', ['class' => 'alert alert-danger']); ?>
    <?php endif; ?>

    <p><?= $formAttrLable['availability']; ?></p>
    <?= Html::activeDropDownList($model, 'availability', [0 => 'Нет', 1 => 'Да'], ['class' => 'form-control']); ?>

    <br/>
    <p><?= $formAttrLable['is_new']; ?></p>
    <?= Html::activeDropDownList($model, 'is_new', [0 => 'Нет', 1 => 'Да'], ['class' => 'form-control']); ?>
    <br/>
    <p><?= $formAttrLable['is_recommended']; ?></p>
    <?= Html::activeDropDownList($model, 'is_recommended', [0 => 'Нет', 1 => 'Да'], ['class' => 'form-control']); ?>
    <br/>
    <p><?= $formAttrLable['status']; ?></p>
    <?= Html::activeDropDownList($model, 'status', [0 => 'Скрыт', 1 => 'Отображается'], ['class' => 'form-control']); ?>
    <br/>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>

    <?= Html::endForm(); ?>
</div>
