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

                <?php if ($result): ?>
                    <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                <?php else: ?>
                    <div class="container">
                    <div class="col-sm-4"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <h5>Есть вопрос? Напишите нам</h5>
                        <br/>
                        <?php $form = ActiveForm::begin(); ?>
                            <?php echo $form->field($contact, 'userEmail'); ?>
                            <?php echo $form->field($contact, 'userText'); ?>
                            <?php echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
                        <?php ActiveForm::end(); ?>
                    </div><!--/sign up form-->
                <?php endif; ?>

                <br/>
                <br/>
                </div>
            </div>
        </div>
    </div>
</section>