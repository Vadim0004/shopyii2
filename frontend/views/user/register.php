<?php
use frontend\assets\MyShopAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-4 col-sm-offset-4 padding-right">

        <?php echo $form->field($user, 'name'); ?>
        <?php echo $form->field($user, 'email'); ?>
        <?php echo $form->field($user, 'password')->passwordInput(); ?>
        <?php echo Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']); ?>

    </div>
    <?php ActiveForm::end(); ?>
