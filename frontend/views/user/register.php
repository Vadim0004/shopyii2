<?php

use frontend\assets\MyShopAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRegister */

MyShopAsset::register($this);

$this->registerJsFile('@web/js/myFooter.js', ['depends' => [
    MyShopAsset::className()
]]);

// @var $this yii\web\View
$this->title = 'User Register';
$this->registerMetaTag([
    'name' => 'User Register',
    'content' => 'User description',
]);
?>

<div class="row">
    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
