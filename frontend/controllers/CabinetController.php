<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\models\repository\Userrepository;
use common\models\activerecord\User;
use frontend\models\repository\Productorderrepository;
use frontend\models\repository\Productrepository;

class CabinetController extends Controller
{
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = \frontend\models\User::checkLogged();
        $userRepository = new Userrepository();
        
        $userData = $userRepository->getUserById($userId);
        
        return $this->render('index', [
            'userData' => $userData,
            'userId' => $userId,
        ]);
    }
    
    public function actionEdit()
    {
        // Получаем id пользователя из сессии
        $userId = \frontend\models\User::checkLogged();
        $userRepository = new Userrepository();
        $userActiveRecord = new User();
        
        $userData = $userRepository->getUserById($userId);
        
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_EDIT;
        
        $formData = Yii::$app->request->post();
        
        $result = false;
        
        if (Yii::$app->request->isPost) {
            $user->attributes = $formData;
            
            $errors = false;
            
            if ($user->validate()) {
                $result = $userActiveRecord->saveUserAfterEdite($userId, $user->name, $user->password);
            } else {
                $user->getErrors();
                $errors[] = 'Ошибка!';
            }
        }
        
        return $this->render('edit', [
            'user' => $user,
            'userData' => $userData,
            'result' => $result,
        ]);
    }
    
    public function actionHistory()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = \frontend\models\User::checkLogged();
        
        $productOrdersRepository = new Productorderrepository();
        $orders = $productOrdersRepository->getOrdersByAuthorId($userId);

        $products = [];
        $arrayProductsFromOrder = [];
        foreach ($orders as $ordersItem) {
            $arrayProductsFromOrder[$ordersItem['id']] = json_decode($ordersItem['products'], true);
            $arrayKeysProduct = array_keys($arrayProductsFromOrder[$ordersItem['id']]);
            $productRepository = new Productrepository();
            $products[$ordersItem['id']] = $productRepository->getAllProductById($arrayKeysProduct);
        }
        
        return $this->render('history', [
            'orders' => $orders,
            'products' => $products,
            'arrayProductsFromOrder' => $arrayProductsFromOrder,
        ]);
    }
}