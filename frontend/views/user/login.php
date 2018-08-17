<?php

use frontend\assets\MyShopAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRegister */

MyShopAsset::register($this);

$this->title = 'User Login';
$this->registerMetaTag([
    'name' => 'User Login',
    'content' => 'description of the page',
]);
?>

<div class="row">
    <h5 class="text-center">Введите Ваши данные для входа в личный кабинет</h5><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>