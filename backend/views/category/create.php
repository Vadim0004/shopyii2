<?php

use backend\assets\AdminAsset;

AdminAsset::register($this);

use yii\helpers\Url;
use yii\helpers\Html;

// @var $this yii\web\View
$this->title = 'E-shopper';
$this->registerMetaTag([
    'name' => 'E-shopper',
    'content' => 'E-shopper main page',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php echo Url::to(['/']); ?>">Админпанель</a></li>
                    <li><a href="<?php echo Url::to(['category/index']); ?>">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>

            <h4>Добавить новую категорию</h4>

            <div class="col-sm-6">
                <div class="login-form">
                    <?= Html::beginForm(); ?>
                        <p><?= $formLabel['name']; ?></p>
                        <?= Html::activeInput('varchar', $modelCategory, 'name', ['class' => 'form-control']) . '<br>'; ?>
                        <?php if ($modelCategory->hasErrors()): ?>
                            <?= Html::error($modelCategory, 'name', ['class' => 'alert alert-danger']) ?>
                        <?php endif; ?>
                        <p><?= $formLabel['sort_order']; ?></p>
                        <?= Html::activeDropDownList($modelCategory, 'sort_order', [1 => 1, 2 => 2, 3 => 3, 4 => 4]) . '<br>' ?>
                        <br/><br/>
                        <p><?= $formLabel['status']; ?></p>
                        <?= Html::activeDropDownList($modelCategory, 'status', [0 => 'Скрыт', 1 => 'Отображается']) . '<br>' ?>
                        <br/><br/>
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
                    <?= Html::endForm(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
