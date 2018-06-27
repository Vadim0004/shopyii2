<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

// @var $this yii\web\View
$this->title = 'Checkout';
$this->registerMetaTag([
    'name' => 'Checkout',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?php echo Yii::$app->urlManager->createUrl(['syte/category', 'categoryId' => $categoryItem['id']]); ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>


                    <?php if ($result): ?>

                        <p>Заказ оформлен. Мы Вам перезвоним.</p>
                        <a href="<?php echo Yii::$app->urlManager->createUrl(['/']); ?>" class="btn btn-primary">В магазин</a>

                    <?php else: ?>

                        <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p><br/>

                        <div class="col-sm-12">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="form">
                                <?php $form = ActiveForm::begin(); ?>

                                <?php echo $form->field($chekout, 'userName') ?>
                                <?php echo $form->field($chekout, 'userPhone') ?>
                                <?php echo $form->field($chekout, 'userComment') ?>
                                <?php echo Html::submitButton('Оформить', ['class' => 'btn btn-primary']); ?>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>