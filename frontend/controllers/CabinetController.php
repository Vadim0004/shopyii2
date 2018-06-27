<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\models\Order;
use frontend\models\Product;

class CabinetController extends Controller
{
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        $userData = User::getUserById($userId);
        
        return $this->render('index', [
            'userData' => $userData,
            'userId' => $userId,
        ]);
    }
    
    public function actionEdit()
    {
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаеи информацию о пользователе из БД
        $userData = [];
        $userData = User::getUserById($userId);
        
        $name = $userData['name'];
        $password = $userData['password'];
        
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_EDIT;
        
        $formData = Yii::$app->request->post();
        
        $result = false;
        
        if (Yii::$app->request->isPost) {
            $user->attributes = $formData['UserRegister'];
            
            $errors = false;
            
            $result = $user->edit($userId);
            
            if ($user->validate() && $result) {

            } else {
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
        // Проверяем залогинен ли пользователь и получаем из сесси его id
        $userId = User::checkLogged();
        
        // Из таблицы заказов берем все его заказы по user_id
        $orders = Order::getOrdersByAuthorId($userId);
        
        return $this->render('history', [
            'userId' => $userId,
            'orders' => $orders,
        ]);
    }
}