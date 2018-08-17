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
        $form = new UserRegister();
        $form->scenario = UserRegister::SCENARIO_USER_REGISTER;

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userServices->registerCustomer($form);
                Yii::$app->session->setFlash('success', 'Thanks for Register!');
                return $this->redirect(['user/login']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('register', [
            'model' => $form,
        ]);

    }

    public function actionLogin()
    {
        $form = new UserRegister();
        $form->scenario = UserRegister::SCENARIO_USER_LOGIN;

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->userServices->loginCustomer($form);
                Yii::$app->response->redirect(['cabinet/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('login', [
            'model' => $form,
        ]);
    }

    public function actionLogout()
    {
        \frontend\models\User::checkLogout();
    }
}