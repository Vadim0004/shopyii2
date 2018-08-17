<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model frontend\models\UserRegister */

?>

<?php $form = ActiveForm::begin(); ?>
<div class="col-sm-4 col-sm-offset-4 padding-right">
    <?= $form->field($model, 'name'); ?>
    <?= $form->field($model, 'email'); ?>
    <?= $form->field($model, 'password')->passwordInput(); ?>
    <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
