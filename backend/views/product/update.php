<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $formAttrLable backend\controllers\ProductController array */
/* @var $product backend\controllers\ProductController ActiveRecord */
/* @var $category backend\controllers\ProductController ActiveRecord */
/* @var $modelImage backend\models\UploadForm ActiveRecord */

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['site/index']) ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['product/index']) ?>">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>

            <h4>Редактировать товар #<?php echo $product->id; ?></h4>
            <br/>
            <?= $this->render('_form', [
                'product' => $product,
                'category' => $category,
                'modelImage' => $modelImage,
                'formAttrLable' => $formAttrLable,
                'model' => $model,
            ]);
            ?>
        </div>
    </div>
</section>
