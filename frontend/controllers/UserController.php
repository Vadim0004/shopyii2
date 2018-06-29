<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\models\repository\Userrepository;
use frontend\models\activerecord\User;

class UserController extends Controller
{
    public function actionRegister()
    {        
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_REGISTER;
        
        $userRepository = new Userrepository();
        $userActiveRecord = new User();
        
        $formData = Yii::$app->request->post();
         
        if(Yii::$app->request->isPost) {
            
            $user->attributes = $formData['UserRegister'];
            $errors = false;
            $errors = [];
            
            $userInDbIsset = $userRepository->checkExistEmailInDb($user->email);

            if ($userInDbIsset) {
                $errors[] = 'Данный email существет, повторите попытку с другим email';
            }
            
            if ($errors == false) {
                if ($user->validate()) {
                    $create = $userActiveRecord->saveUserAfterRegister($user->name, $user->email, $user->password);
                    Yii::$app->session->setFlash('success', 'Registered!');
                    
                    return $this->redirect(Yii::$app->urlManager->createUrl(['user/login']));
                }
            }
            
        }
        
        return $this->render('register', [
            'user' => $user,
            'formData' => $formData,
            'errors' => $errors,
            'create' => $create,
        ]);
        
    }
    
    public function actionLogin()
    {
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_LOGIN;
        
        $userRepository = new Userrepository();

        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {

            $user->attributes = $formData['UserRegister'];

            $errors = false;
            
            $userId = $userRepository->checkUserData($user->email, $user->password);
            
            if ($user->validate() && $userId) {
                // Если данные правильные, запоминаем пользователя (сессия)
                Yii::$app->session['user'] = $userId;
                
                // Перенаправляем пользователя в закрытую часть - кабинет
                Yii::$app->response->redirect(['cabinet/index']);
            } else {
                $errors[] = 'Неправильные данные для входа на сайт';
            }
        }

        return $this->render('login', [
            'errors' => $errors,
            'user' => $user,
        ]);
    }
    
    public function actionLogout()
    {
        \frontend\models\User::checkLogout();
    }
}