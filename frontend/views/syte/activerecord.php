<?php
/* $this yii/web/View */
/* $var $testDb frontend/models/example/Testdb */
/* $var $testDbModel frontend/models/example/Testdbmodel */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="col-sm-6">
    <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($testDbModel, 'title'); ?>
        <?php echo $form->field($testDbModel, 'content'); ?>
        <?php echo $form->field($testDbModel, 'status'); ?>

        <?php echo Html::submitButton('Save', [
            'class' => 'btn btn-primary'
        ]); ?>
    <?php ActiveForm::end(); ?>
</div>