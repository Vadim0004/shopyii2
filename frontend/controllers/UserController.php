<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\models\User;

class UserController extends Controller
{
    public function actionRegister()
    {        
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_REGISTER;
        
        $formData = Yii::$app->request->post();
         
        if(Yii::$app->request->isPost) {
            
            $user->attributes = $formData['UserRegister'];
            
            $errors = false;
            $errors = [];
            
            $userInDbIsset = $user->checkExistEmailInDb();

            if (!$userInDbIsset) {
                $errors[] = 'Данный email существет, повторите попытку с другим email';
            }
            
            if ($errors == false) {
                if ($user->validate() && $create = $user->saveUserAfterRegister()) {
                    Yii::$app->session->setFlash('success', 'Registered!');
                }
            } else {
                // echo 'FATAL ERROR';
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

        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {

            $user->attributes = $formData['UserRegister'];

            $errors = false;
            
            $userId = $user->checkUserData();
            
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
            'userId' => $userId,
        ]);
    }
    
    public function actionLogout()
    {
        User::checkLogout();
    }
}