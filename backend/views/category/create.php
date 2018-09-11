<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryForm */

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
                    <li><a href="<?php echo Url::to(['/']); ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['category/index']); ?>">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>
            <h4>Добавить новую категорию</h4>
            <?= $this->render('_form', [
                'model' => $model,
            ]);
            ?>
        </div>
    </div>
</section>
