<?php
use frontend\assets\MyShopAsset;
use yii\helpers\Html;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Cabinet';
$this->registerMetaTag([
    'name' => 'Cabinet',
    'content' => 'description of the page',
]);
?>

<section>
    <div class="container">
        <div class="row">

            <?= Html::tag('h3', 'Личный кабинет');?>
            <?= Html::tag('h4', 'Привет ' . $userData->name);?>
            <ul>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/edit'); ?>">Отредактировать Данные</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/history'); ?>">Список покупок</a></li>
				<li><a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/addAddressBook'); ?>">Добавить личные данные</a></li>
            </ul>

        </div>
    </div>
</section>