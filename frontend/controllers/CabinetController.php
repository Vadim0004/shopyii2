<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\models\Order;
use frontend\models\repository\Userrepository;
use frontend\models\activerecord\User;

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
        
        $name = $userData['name'];
        $password = $userData['password'];
        
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