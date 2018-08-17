<?php

use backend\assets\AdminAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

AdminAsset::register($this);

use yii\helpers\Url;

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
                    <li><a href="<?php echo Url::to(['/']); ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['category/index']); ?>">Управление категориями</a></li>
                    <li class="active">Отредактировать товар</li>
                </ol>
            </div>
            <?= $this->render('_form', [
                'model' => $model,
            ]);
            ?>
        </div>
    </div>
</section>