<?php

use backend\assets\AdminAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

AdminAsset::register($this);

/* @var $this yii\web\View */

$this->registerJsFile('@web/js/brand/test.js', ['depends' => [
    AdminAsset::className()
]]);

$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['brand/ajax'],
    'id' => 'ajax_form',
]);
?>

<div class="box box-default">
    <div class="box-header with-border">Common</div>
    <div class="box-body">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    </div>
</div>

<div class="box box-default">
    <div class="box-header with-border">SEO</div>
    <div class="box-body">
        <?= $form->field($model->_meta, 'title')->textInput() ?>
        <?= $form->field($model->_meta, 'description')->textarea(['rows' => 2]) ?>
        <?= $form->field($model->_meta, 'keywords')->textInput() ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Save', ['id' => 'send', 'class' => 'btn btn-primary']) ?>
</div>

<div id="result_form">1111<div>

<?php ActiveForm::end(); ?>
