<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\BrandForm */

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>
<div class="row">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>