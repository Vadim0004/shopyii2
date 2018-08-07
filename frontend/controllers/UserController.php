<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\services\user\UserService;


class UserController extends Controller
{
    private $userServices;
    
    public function __construct($id, $module, UserService $userServices, $config = [])
    {
        $this->userServices = $userServices;
        parent::__construct($id, $module, $config);
    }

    public function actionRegister()
    {        
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_REGISTER;
        
        $formData = Yii::$app->request->post();
         
        if (Yii::$app->request->isPost) {
            $user->attributes = $formData['UserRegister'];
            if ($user->validate()) {
                try {
                    $this->userServices->registerCustomer($user);
                    Yii::$app->session->setFlash('success', 'Registered!');
                    return $this->redirect(['user/login']);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('register', [
            'user' => $user,
            'formData' => $formData,
        ]);
        
    }

    public function actionLogin()
    {
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_LOGIN;
        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {
            $user->attributes = $formData['UserRegister'];
            if ($user->validate()) {
                try {
                    $this->userServices->loginCustomer($user);
                    Yii::$app->response->redirect(['cabinet/index']);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('login', [
            'user' => $user,
        ]);
    }
    
    public function actionLogout()
    {
        \frontend\models\User::checkLogout();
    }
}