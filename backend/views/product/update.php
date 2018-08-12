<?php

use backend\assets\AdminAsset;
use frontend\models\repository\ProductRepository;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

AdminAsset::register($this);

use yii\helpers\Url;

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
					<li><a href="<?php echo Url::to(['site/index'])?>">Админпанель</a></li>
					<li><a href="<?php echo Url::to(['product/index'])?>">Управление товарами</a></li>
					<li class="active">Редактировать товар</li>
				</ol>
			</div>

			<h4>Редактировать товар #<?php echo $product->id; ?></h4>
			<br/>

			<div class="col-lg-6">
				<div class="login-form">
                    <?= Html::beginForm(['product/update', 'id' => $product->id], 'post', ['enctype' => 'multipart/form-data']); ?>
						<p>Название товара</p>
							<?= Html::input('text', 'name', $product->name, ['class' => 'form-control']) . '<br>'; ?>
								<?php if ($modelProduct->hasErrors()): ?>
									<?= Html::error($modelProduct, 'name', ['class' => 'alert alert-danger']) ?>
								<?php endif; ?>
						<p>Артикул</p>
                    		<?= Html::input('text', 'code', $product->code, ['class' => 'form-control']) . '<br>'; ?>
								<?php if ($modelProduct->hasErrors()): ?>
									<?= Html::error($modelProduct, 'code', ['class' => 'alert alert-danger']) ?>
								<?php endif; ?>
						<p>Стоимость, $</p>
                    		<?= Html::input('text', 'price', $product->price, ['class' => 'form-control']) . '<br>'; ?>
								<?php if ($modelProduct->hasErrors()): ?>
									<?= Html::error($modelProduct, 'price', ['class' => 'alert alert-danger']) ?>
								<?php endif; ?>
						<p>Категория</p>
                    		<?= Html::DropDownList('category', $product->category_id, ArrayHelper::map($category, 'id', 'name')) . '<br>' ?>
						<br/><br/>
						<p>Производитель</p>
                    		<?= Html::input('text', 'brand', $product->brand, ['class' => 'form-control']) . '<br>'; ?>
								<?php if ($modelProduct->hasErrors()): ?>
									<?= Html::error($modelProduct, 'brand', ['class' => 'alert alert-danger']) ?>
								<?php endif; ?>
						<p>Изображение товара</p>
						<img src="<?php echo productRepository::getImage($product->id) ?>" width="200" alt="" />
							<?= Html::activeFileInput($model, 'image'); ?>
						<p>Детальное описание</p>
                    		<?= Html::textArea('description', $product->description, ['class' => 'form-control']) . '<br>'; ?>
								<?php if ($modelProduct->hasErrors()): ?>
									<?= Html::error($modelProduct, 'description', ['class' => 'alert alert-danger']) ?>
								<?php endif; ?>
						<br/><br/>
						<p>Наличие на складе</p>
                    		<?= Html::dropDownList('availability', $product->availability, [0 => 'Нет', 1 => 'Да']) . '<br>'; ?>
						<br/>
						<p>Новинка</p>
                   			<?= Html::dropDownList('is_new', $product->is_new, [0 => 'Нет', 1 => 'Да']) . '<br>'; ?>
						<br/><br/>
						<p>Рекомендуемые</p>
                    		<?= Html::dropDownList('is_recommended', $product->is_recommended, [0 => 'Нет', 1 => 'Да']) . '<br>'; ?>
						<br/><br/>
						<p>Статус</p>
                    		<?= Html::dropDownList('status', $product->status, [0 => 'Скрыт', 1 => 'Отображается']) . '<br>'; ?>
						<br/><br/>
                    		<?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-default']); ?>
						<br/><br/>
                    <?= Html::endForm(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
