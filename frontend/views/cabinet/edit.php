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
            <?= Html::beginForm(); ?>

			<div class="col-sm-4 col-sm-offset-4 padding-right">
                <?= Html::input('text', 'name', $userData->name, ['class' => 'form-control']) . '<br>'; ?>
                <?php if ($user->hasErrors()): ?>
                    <?= Html::error($user, 'name', ['class' => 'alert alert-danger']) ?>
                <?php endif; ?>
                <?= Html::input('password', 'password', $userData->password, ['class' => 'form-control']) . '<br>'; ?>
                <?php if ($user->hasErrors()): ?>
                    <?= Html::error($user, 'password', ['class' => 'alert alert-danger']) ?>
                <?php endif; ?>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
			</div>

            <?= Html::endForm(); ?>
		</div>
	</div>
</section>