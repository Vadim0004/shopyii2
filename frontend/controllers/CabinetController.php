<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\services\user\Userservice;

class CabinetController extends Controller
{
	private $userService;

	public function __construct(
		$id,
		$module,
		Userservice $userService,
		array $config = [])
	{
		$this->userService = $userService;
		parent::__construct($id, $module, $config);
	}

	public function actionIndex()
    {

	    $userData = $this->userService->getUserBySession();

        return $this->render('index', [
            'userData' => $userData,
        ]);
    }
    
    public function actionEdit()
    {
	    $userData = $this->userService->getUserBySession();
        
        $user = new UserRegister();
        $user->scenario = UserRegister::SCENARIO_USER_EDIT;
        $formData = Yii::$app->request->post();
        $result = false;
        
        if (Yii::$app->request->isPost) {
            $user->attributes = $formData;
            $errors = false;
            if ($user->validate()) {
                $result = $this->userService->editeUserAndSave($userData->id, $user);
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
        $userId = $this->userService->getUserBySession();
	    $orders = $this->userService->getOrders($userId->id);
	    $products = $this->userService->getProductsJsDecode($orders);
	    $productsDecode = $this->userService->getDecodeProducts($orders);

        return $this->render('history', [
            'orders' => $orders,
	        'products' => $products,
	        'productsDecode' => $productsDecode
        ]);
    }
}