<?php
use frontend\assets\MyShopAsset;
use yii\helpers\Html;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Cabinet Edit';
$this->registerMetaTag([
    'name' => 'Cabinet Edit',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">
            <h4 class="col-sm-4 col-sm-offset-4 padding-right">Редактирование данных</h4>
            <?php if (!$result == false): ?>

                <h4 class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php echo ' - Вы поменяли свои данные' . '<br>'; ?>
                    <a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/index'); ?>"class="btn btn-primary">В личный кабинет</a>
                </h4>

            <?php else: ?>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <?php foreach ($errors as $error): ?>
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li> - <?php echo $error; ?></li>
                        </ul>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?= Html::beginForm(); ?>

                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?= Html::input('text', 'name', $userData->name, ['class' => 'form-control']) . '<br>'; ?>
                    <?= Html::input('password', 'password', $userData->password, ['class' => 'form-control']) . '<br>'; ?>
                    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']); ?>
                </div>

                <?= Html::endForm(); ?>

            <?php endif; ?>
        </div>
    </div>
</section>