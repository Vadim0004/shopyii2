<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\MyShopAsset;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Contact';
$this->registerMetaTag([
    'name' => 'Contact',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <div class="container">
                    <div class="col-sm-4"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <h5>Есть вопрос? Напишите нам</h5>
                        <br/>
                        <?php $form = ActiveForm::begin(); ?>
                            <?= $form->field($contact, 'userEmail'); ?>
                            <?= $form->field($contact, 'userText'); ?>
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
                        <?php ActiveForm::end(); ?>
                    </div><!--/sign up form-->
                <br/>
                <br/>
                </div>
            </div>
        </div>
    </div>
</section>