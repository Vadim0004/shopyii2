<?php

namespace frontend\controllers;

use frontend\services\cart\CartService;
use Yii;
use frontend\models\Checkout;
use frontend\models\User;
use frontend\models\Cart;
use yii\web\Controller;

class CartController extends Controller
{
    private $cartService;

    public function __construct($id, $module, CartService $cartService, array $config = [])
    {
        $this->cartService = $cartService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $productsInCart = Cart::getProducts();
        $products = $this->cartService->indexCart($productsInCart);
        $totalPrice = Cart::getTotalPrice($products);

        return $this->render('index', [
            'productsInCart' => $productsInCart,
            'products' => $products,
            'totalPrice' => $totalPrice
        ]);
    }

    public function actionAddajax($id)
    {
        // добавляем товар в корзину

        $id = intval($id);
        echo Cart::addProduct($id);
        die;
    }

    public function actionDelete($id)
    {
        $id = intval($id);
        if ($id) {
            Cart::deleteProduct($id);
            Yii::$app->response->redirect(['cart/index']);
        }
    }

    public function actionCheckout()
    {
        // Получием данные из корзины      
        $productsInCart = Cart::getProducts();
        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            Yii::$app->response->redirect(['/']);
        }
        $products = $this->cartService->indexCart($productsInCart);
        // Находим общую стоимость
        $totalPrice = Cart::getTotalPrice($products);

        // Количество товаров
        $totalQuantity = Cart::countItems();

        $chekout = new Checkout();
        $chekout->scenario = Checkout::SCENARIO_CHECKOUT_SEND;
        $formData = Yii::$app->request->post();

        // Статус успешного оформления заказа
        $result = false;
        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
        } else {
            $userId = User::checkLogged();
        }

        if (Yii::$app->request->isPost) {
            $chekout->attributes = $formData['Checkout'];
            // Флаг ошибок
            $errors = false;
            if ($errors == false) {
                if ($chekout->validate()) {
                    $result = $this->cartService->saveCheckout($userId, $productsInCart, $chekout, $totalPrice);
                }
            }
        }

        return $this->render('checkout', [
            'chekout' => $chekout,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
            'result' => $result,
        ]);
    }
}