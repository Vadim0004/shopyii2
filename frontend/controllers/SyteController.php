<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Contact;
use yii\web\Controller;
use frontend\components\Pagination;
use frontend\models\repository\ProductRepository;
use frontend\services\syte\SyteService;

class SyteController extends Controller
{
    private $productRep;
    private $syteService;


    public function __construct(
        $id,
        $module,
        ProductRepository $productRep,
        SyteService $syteService,
        $config = [])
    {
        $this->productRep = $productRep;
        $this->syteService = $syteService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($page = 1)
    {
        $offset = ($page - 1) * Yii::$app->params['showByDefailtProducts'];

        $latestProducts = $this->productRep->getTotalProductsCategory($offset);
        $total = $this->productRep->getCountProductsCategory();
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Yii::$app->params['showByDefailtProducts'], 'page-');

        return $this->render('index', [
            'latestProducts' => $latestProducts,
            'pagination' => $pagination,
        ]);
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $offset = ($page - 1) * Yii::$app->params['showByDefailtProducts'];

        $categoryProducts = $this->productRep->getProductsListByCategory($categoryId, $offset);
        $total = $this->productRep->getCountProductsByCategory($categoryId);
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Yii::$app->params['showByDefailtProducts'], 'page-');

        return $this->render('category', [
            'categoryId' => $categoryId,
            'categoryProducts' => $categoryProducts,
            'pagination' => $pagination,
        ]);
    }

    public function actionContact()
    {
        $contact = new Contact();
        $contact->scenario = Contact::SCENARIO_USER_CONTACT;

        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {
            $contact->attributes = $formData['Contact'];
            if ($contact->validate()) {
                try {
                    $this->syteService->sendLetter($contact);
                    Yii::$app->getSession()->setFlash('success', 'Письмо отправлено успешно');
                    return $this->redirect(['syte/index']);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('contact', [
            'contact' => $contact,
        ]);
    }

}