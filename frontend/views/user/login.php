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

<?php if (!empty($errors) && is_array($errors)):?>
    <?php foreach ($errors as $error):?>
            <ul>
            <li><?php echo $error;?></li>
        </ul>
    <?php endforeach;?>
<?php endif;?>

<div class="col-sm-4 col-sm-offset-4 padding-right">
<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($user, 'email'); ?>
    <?php echo $form->field($user, 'password')->passwordInput(); ?>
    <?php echo Html::submitButton('SIGN IN', ['class' => 'btn btn-primary']); ?>
    
<?php ActiveForm::end(); ?>
</div>