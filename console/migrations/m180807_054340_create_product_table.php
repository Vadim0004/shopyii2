<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180807_054340_create_product_table extends Migration
{
	/**
	 * @inheritdoc
	 */
	public function up()
	{
		$this->createProduct();
	}

	private function createProduct()
	{
		$this->createTable('product', [
			'id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
			'category_id' => $this->integer(11)->notNull(),
			'code' => $this->integer(11)->notNull(),
			'price' => $this->float()->notNull(),
			'availability' => $this->integer(2)->notNull(),
			'brand' => $this->string(255)->notNull(),
			'description' => $this->text()->notNull(),
			'is_new' => $this->integer(11)->defaultValue(0)->notNull(),
			'is_recommended' => $this->integer(11)->defaultValue(0)->notNull(),
			'status' => $this->integer(11)->defaultValue(1)->notNull(),
		]);

		$this->insert('product', [
			'id' => 34,
			'name' => 'Ноутбук Asus X200MA (X200MA-KX315D)',
			'category_id' => 13,
			'code' => 1839707,
			'price' => 395,
			'availability' => 1,
			'brand' => 'Asus',
			'description' => 'Экран 11.6" (1366x768) HD LED, глянцевый / Intel Pentium N3530 (2.16 - 2.58 ГГц) / RAM 4 ГБ / HDD 750 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / синий',
			'is_new' => 0,
			'is_recommended' => 0,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 35,
			'name' => 'Ноутбук HP Stream 11-d050nr',
			'category_id' => 13,
			'code' => 2343847,
			'price' => 305,
			'availability' => 0,
			'brand' => 'Hewlett Packard',
			'description' => 'Экран 11.6” (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / eMMC 32 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 + MS Office 365 / 1.28 кг / синий',
			'is_new' => 1,
			'is_recommended' => 1,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 36,
			'name' => 'Ноутбук Asus X200MA White ',
			'category_id' => 13,
			'code' => 2028027,
			'price' => 270,
			'availability' => 1,
			'brand' => 'Asus',
			'description' => 'Экран 11.6" (1366x768) HD LED, глянцевый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Bluetooth 4.0 / Wi-Fi / LAN / веб-камера / без ОС / 1.24 кг / белый',
			'is_new' => 0,
			'is_recommended' => 1,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 37,
			'name' => 'Ноутбук Acer Aspire E3-112-C65X',
			'category_id' => 13,
			'code' => 2019487,
			'price' => 325,
			'availability' => 1,
			'brand' => 'Acer',
			'description' => 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Linpus / 1.29 кг / серебристый',
			'is_new' => 0,
			'is_recommended' => 1,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 38,
			'name' => 'Ноутбук Acer TravelMate TMB115',
			'category_id' => 13,
			'code' => 1953212,
			'price' => 275,
			'availability' => 1,
			'brand' => 'Acer',
			'description' => 'Экран 11.6\'\' (1366x768) HD LED, матовый / Intel Celeron N2840 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / Linpus / 1.32 кг / черный',
			'is_new' => 0,
			'is_recommended' => 0,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 39,
			'name' => 'Ноутбук Lenovo Flex 10',
			'category_id' => 13,
			'code' => 1602042,
			'price' => 370,
			'availability' => 0,
			'brand' => 'Lenovo',
			'description' => 'Экран 10.1" (1366x768) HD LED, сенсорный, глянцевый / Intel Celeron N2830 (2.16 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Windows 8.1 / 1.2 кг / черный',
			'is_new' => 0,
			'is_recommended' => 0,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 40,
			'name' => 'Ноутбук Asus X751MA',
			'category_id' => 13,
			'code' => 2028367,
			'price' => 430,
			'availability' => 1,
			'brand' => 'Asus',
			'description' => 'Экран 17.3" (1600х900) HD+ LED, глянцевый / Intel Pentium N3540 (2.16 - 2.66 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth 4.0 / веб-камера / DOS / 2.6 кг / белый',
			'is_new' => 0,
			'is_recommended' => 1,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 41,
			'name' => 'Samsung Galaxy Tab S 10.5 16GB',
			'category_id' => 14,
			'code' => 1129365,
			'price' => 780,
			'availability' => 1,
			'brand' => 'Samsung',
			'description' => 'Samsung Galaxy Tab S создан для того, чтобы сделать вашу жизнь лучше. Наслаждайтесь своим контентом с покрытием 94% цветов Adobe RGB и 100000:1 уровнем контрастности, который обеспечивается sAmoled экраном с функцией оптимизации под отображаемое изображение и окружение. Яркий 10.5” экран в ультратонком корпусе весом 467 г порадует вас высоким уровнем портативности. Работа станет проще вместе с Hancom Office и удаленным доступом к вашему ПК. E-Meeting и WebEx – отличные помощники для проведения встреч, когда вы находитесь вне офиса. Надежно храните ваши данные благодаря сканеру отпечатка пальцев.',
			'is_new' => 1,
			'is_recommended' => 1,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 42,
			'name' => 'Samsung Galaxy Tab S 8.4 16GB',
			'category_id' => 14,
			'code' => 1128670,
			'price' => 640,
			'availability' => 1,
			'brand' => 'Samsung',
			'description' => 'Экран 8.4" Super AMOLED (2560x1600) емкостный Multi-Touch / Samsung Exynos 5420 (1.9 ГГц + 1.3 ГГц) / RAM 3 ГБ / 16 ГБ встроенной памяти + поддержка карт памяти microSD / Bluetooth 4.0 / Wi-Fi 802.11 a/b/g/n/ac / основная камера 8 Мп, фронтальная 2.1 Мп / GPS / ГЛОНАСС / Android 4.4.2 (KitKat) / 294 г / белый',
			'is_new' => 0,
			'is_recommended' => 0,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 43,
			'name' => 'Gazer Tegra Note 7',
			'category_id' => 14,
			'code' => 683364,
			'price' => 210,
			'availability' => 1,
			'brand' => 'Gazer',
			'description' => 'Экран 7" IPS (1280x800) емкостный Multi-Touch / NVIDIA Tegra 4 (1.8 ГГц) / RAM 1 ГБ / 16 ГБ встроенной памяти + поддержка карт памяти microSD / Wi-Fi / Bluetooth 4.0 / основная камера 5 Мп, фронтальная - 0.3 Мп / GPS / ГЛОНАСС / Android 4.4.2 (KitKat) / вес 320 г',
			'is_new' => 0,
			'is_recommended' => 0,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 44,
			'name' => 'Монитор 23" Dell E2314H Black',
			'category_id' => 15,
			'code' => 355025,
			'price' => 175,
			'availability' => 1,
			'brand' => 'Dell',
			'description' => 'С расширением Full HD Вы сможете рассмотреть мельчайшие детали. Dell E2314H предоставит Вам резкое и четкое изображение, с которым любая работа будет в удовольствие. Full HD 1920 x 1080 при 60 Гц разрешение (макс.)',
			'is_new' => 0,
			'is_recommended' => 0,
			'status' => 1,
		]);

		$this->insert('product', [
			'id' => 45,
			'name' => 'Компьютер Everest Game ',
			'category_id' => 16,
			'code' => 1563832,
			'price' => 1320,
			'availability' => 1,
			'brand' => 'Everest',
			'description' => 'Everest Game 9085 — это компьютеры премимум класса, собранные на базе эксклюзивных компонентов, тщательно подобранных и протестированных лучшими специалистами нашей компании. Это топовый сегмент систем, который отвечает наилучшим характеристикам показателей качества и производительности.',
			'is_new' => 1,
			'is_recommended' => 0,
			'status' => 1,
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down()
	{
		$this->dropTable('product');
	}
}
