<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\services\user\Userservice;
use frontend\models\AddressBook;
use frontend\models\repository\CountriesRepository;
use frontend\services\cabinet\CabinetService;

class CabinetController extends Controller
{
	private $userService;
	private $cabinetService;

	public function __construct(
		$id,
		$module,
		Userservice $userService,
		CabinetService $cabinetService,
		array $config = [])
	{
		$this->userService = $userService;
		$this->cabinetService = $cabinetService;
		parent::__construct($id, $module, $config);
	}

	public function actionIndex()
    {
	    $userData = $this->userService->getUserBySession();

        return $this->render('index', [
            'userData' => $userData,
        ]);
    }

    public function actionAddaddressbook()
    {
        $userData = $this->userService->getUserBySession();
        $form = new AddressBook();
        $formAttrLable = $form->attributeLabels();
        $countries = new CountriesRepository();
        $countriesList = $countries->getAllCountries();
        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost && $form->validate()) {
            $form->attributes = $formData['AddressBook'];
            $formSave = $this->cabinetService->addCustomerDetails($userData->id, $form);
            return $this->redirect('/cabinet/index');
        }

        return $this->render('addAddressBook', [
            'userData' => $userData,
            'form' => $form,
            'countriesList' => $countriesList,
            'formAttrLable' => $formAttrLable,
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