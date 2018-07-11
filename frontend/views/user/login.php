<?php
use frontend\assets\MyShopAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'User Login';
$this->registerMetaTag([
    'name' => 'User Login',
    'content' => 'description of the page',
]);
?>

<div class="col-sm-4 col-sm-offset-4 padding-right">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'email'); ?>
    <?= $form->field($user, 'password')->passwordInput(); ?>
    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']); ?>
    
<?php ActiveForm::end(); ?>
</div>