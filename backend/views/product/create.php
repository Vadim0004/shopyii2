<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $formAttrLable backend\controllers\ProductController array */
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
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['site/index']) ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['product/index']) ?>">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>
            <h4>Добавить новый товар</h4>
            <br/>
            <?= $this->render('_form', [
                'category' => $category,
                'modelImage' => $modelImage,
                'formAttrLable' => $formAttrLable,
                'model' => $model,
            ]);
            ?>
        </div>
    </div>
</section>