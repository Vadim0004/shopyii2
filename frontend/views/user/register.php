<?php
use frontend\assets\MyShopAsset;
use frontend\models\Product;
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
    'content' => 'description of the page',
]);
?>


<?php if (isset($create)): ?>
    <h4>
        <?php echo ' - Вы зарегестированы' . '<br>'; ?>
    </h4>
<a href="<?php echo Yii::$app->urlManager->createUrl('user/login'); ?>" class="btn btn-default">Вход в личный кабинет</a>
<?php else: ?>
    <?php if (!empty($errors) && is_array($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <ul>
                <li><?php echo $error; ?></li>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-4 col-sm-offset-4 padding-right">

        <?php echo $form->field($user, 'name'); ?>
        <?php echo $form->field($user, 'email'); ?>
        <?php echo $form->field($user, 'password')->passwordInput(); ?>
        <?php echo Html::submitButton('submit', ['class' => 'btn btn-primary']); ?>

    </div>
    <?php ActiveForm::end(); ?>

<?php endif; ?>