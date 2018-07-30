<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Checkout;
use frontend\models\User;
use frontend\models\Cart;
use yii\web\Controller;
use frontend\models\repository\Productrepository;
use common\models\activerecord\ProductOrder;

class CartController extends Controller
{
    public function actionIndex()
    {

        // Получим данные из корзины
        $productsInCart = Cart::getProducts();
        $productsRepository = new Productrepository();
        
        if ($productsInCart) {
            // Получкаем полную информацию о товарах для списка
            $productIds = array_keys($productsInCart);

            $products = $productsRepository->getAllProductById($productIds);
            
            // Получаем общую стоимость
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        return $this->render('index', [
            'productsInCart' => $productsInCart,
            'productIds' => $productIds,
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

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        
        $productsInCart = Cart::getProducts();
        $productsInCartRevert = array_flip($productsInCart);
        $productsRepository = new Productrepository();
	    $products = $productsRepository->getAllProductById($productsInCartRevert);

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
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        // Обработка формы
        if (Yii::$app->request->isPost) {
            $chekout->attributes = $formData['Checkout'];
            
            $userId = User::checkLogged();
            // Флаг ошибок
            $errors = false;
            
            if ($errors == false) {
                // Если ошибок нет
                if ($chekout->validate()) {
                    // Сохраняем заказ в базе данных
                    $productActiveRecord = new ProductOrder();
                    $result = $productActiveRecord->orderSave($userId, $productsInCart, $chekout->userName, $chekout->userPhone, $chekout->userComment);
                    
                    if ($result) {
                        // Если заказ успешно сохранен
                        // Оповещаем администратора о новом заказе по почте                
                        $adminEmail = 'shop@gmail.com';
                        $message = '<a href="http://localhost/admin/orders">Список заказов</a>';
                        $subject = 'Новый заказ!';
                        mail($adminEmail, $subject, $message);

                        // Очищаем корзину
                        Cart::clear();
                    }
                }
            }
        }
        
        return $this->render('checkout',[
            'chekout' => $chekout,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
            'result' => $result,
        ]);
    }
}