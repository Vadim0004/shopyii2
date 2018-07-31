<?php

use frontend\models\repository\Productorderrepository;
use frontend\assets\MyShopAsset;

MyShopAsset::register($this);

// @var $this yii\web\View
$this->title = 'Cabinet History';
$this->registerMetaTag([
	'name' => 'Cabinet History',
	'content' => 'description of the page',
]);
?>

<div class="container">
	<div class="row">
		<h4>Таблица заказов</h4>
		<table class="table-bordered table-striped table">
			<tr>
				<th>Номер заказа</th>
				<th>Номер телефона</th>
				<th>Коментарий к заказу</th>
				<th>Дата заказа</th>
				<th>Статус</th>
				<th>Продукт</th>
				<th>Общая цена заказа</th>
			</tr>
			<?php foreach ($orders as $order): ?>
				<?php foreach ($order['productOrdersById'] as $item): ?>
					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['user_phone']; ?></td>
						<td><?php echo $item['user_comment']; ?></td>
						<td><?php echo $item['date']; ?></td>
						<td><?php echo Productorderrepository::getNameStatusOrder($item['status']); ?></td>
						<td>
							<?php foreach ($products[$item['id']] as $product): ?>
								<?php echo 'Имя продукта' . ' - ' . '<b>' . $product['name'] . '</b>' . '<br>'; ?>
								<?php echo 'Количество' . ' - ' . '<b>' . $productsDecode[$item['id']][$product['id']] . '</b>' . '<br>'; ?>
								<?php echo 'Цена за еденицу' . ' - ' . $product['price'] . '<br>'; ?>
							<?php endforeach; ?>
						</td>
						<td><?php echo '<b>' . $item['value'] . '</b>' . '<br>'; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>

		</table>

		<a href="<?php echo Yii::$app->urlManager->createUrl('cabinet/index'); ?>">
			<button class="btn btn-primary">Назад</button>
		</a>
	</div>
</div>