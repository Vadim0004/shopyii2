<?php
/* @var $this yii\web\View */
/* @book[] frontend\models\example\Book Model*/
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="col-sm-8">
    <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($book, 'name'); ?>
        <?php echo $form->field($book, 'isbn'); ?>
        <?php echo $form->field($book, 'date_published'); ?>

        <?php echo Html::submitButton('Сохранить', [
            'class' => 'btn btn-primary'
        ]); ?>
    <?php ActiveForm::end(); ?>
</div>