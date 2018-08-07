<?php

namespace frontend\services\cart;

use frontend\models\Checkout;
use frontend\models\repository\ProductRepository;
use common\models\activerecord\ProductOrder;
use frontend\models\repository\ProductOrderRepository;
use frontend\models\Cart;
use yii\helpers\Url;
use Yii;

class CartService
{
    private $adminEmail;
	private $productRepository;
	private $productOrder;
	private $productOrderRepository;

	public function __construct(
        $adminEmail,
        ProductRepository $productRepository,
        ProductOrder $productOrder,
        ProductOrderRepository $productOrderRepository)
	{
	    $this->adminEmail = $adminEmail;
		$this->productRepository = $productRepository;
		$this->productOrder = $productOrder;
		$this->productOrderRepository = $productOrderRepository;
	}

	public function indexCart($productsInCart)
	{
		if ($productsInCart) {
			$productIds = array_keys($productsInCart);
			$products = $this->productRepository->getAllProductById($productIds);
			return $products;
		}
	}

    public function sendLetterCart(Checkout $chekout)
    {
        $url = $syte = Url::home(true);
        $message = "Tекст: {$chekout->userComment} . от {$chekout->userName} . Я сделал заказ номер заказаз на сайте . {$url}";
        $result = Yii::$app->mailer->compose()
            ->setFrom($this->adminEmail)
            ->setTo($this->adminEmail)
            ->setTextBody($message)
            ->send();
        if (!$result) {
            throw new \RuntimeException("Don't send Checkout email");
        }
        return $result;
    }

    public function saveCheckout($userId, $productsInCart, Checkout $chekout, $totalPrice)
    {
        $beforeSave = $this->productOrder->orderSave($userId, $productsInCart, $chekout->userName, $chekout->userPhone, $chekout->userComment, $totalPrice);
        $save = $this->productOrderRepository->save($beforeSave);
        if ($save) {
            self::sendLetterCart($chekout);
            Cart::clear();
            return $save;
        }
    }
}