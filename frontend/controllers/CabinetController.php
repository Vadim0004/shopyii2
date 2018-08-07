<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\UserRegister;
use frontend\services\user\UserService;
use frontend\models\AddressBook;
use frontend\services\cabinet\CabinetService;

class CabinetController extends Controller
{
	private $userService;
	private $cabinetService;

	public function __construct(
        $id,
        $module,
        UserService $userService,
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
        $addressBook = $this->userService->getAddressBook($userData);

        return $this->render('index', [
            'userData' => $userData,
            'addressBook' => $addressBook,
        ]);
    }

    public function actionAddaddressbook()
    {
        $userData = $this->userService->getUserBySession();
        $form = new AddressBook();
        $formAttrLable = $form->attributeLabels();
        $countriesList = $this->cabinetService->countriesListAll();
        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost && $form->validate()) {
            $form->attributes = $formData['AddressBook'];
            $formSave = $this->cabinetService->addCustomerDetails($userData->id, $form);
            return $this->redirect(['cabinet/index']);
        }

        return $this->render('addaddressbook', [
            'userData' => $userData,
            'form' => $form,
            'countriesList' => $countriesList,
            'formAttrLable' => $formAttrLable,
        ]);
    }

    public function actionEditaddressbook()
    {
        $userData = $this->userService->getUserBySession();
        $addressBook = $this->cabinetService->getListAddressBook($userData->id);
        $formData = Yii::$app->request->post();
        $form = new AddressBook();
        $formAttrLable = $form->attributeLabels();
        $countriesList = $this->cabinetService->countriesListAll();

        if (Yii::$app->request->isPost) {
            $form->attributes = $formData;
            if ($form->validate()) {
                $formEdit = $this->cabinetService->editCustomerDetails($userData->id, $form);
                return $this->redirect(['cabinet/index']);
            }
        }
        return $this->render('editaddressbook', [
            'addressBook' => $addressBook,
            'countriesList' => $countriesList,
            'formAttrLable' => $formAttrLable
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
                Yii::$app->getSession()->setFlash('success', 'Данные успешно изменены');
                return $this->redirect(['cabinet/index']);
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