<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Contact;
use yii\web\Controller;
use frontend\services\syte\SyteService;

class SyteController extends Controller
{
    private $syteService;

    public function __construct($id, $module, SyteService $syteService, $config = [])
    {
        $this->syteService = $syteService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $pages = $this->syteService->getPagination();
        $products = $this->syteService->getProductsPagination();

        return $this->render('index', [
            'products' => $products,
            'pages' => $pages,
        ]);
    }

    public function actionCategory($categoryId)
    {
        $pages = $this->syteService->getPagination($categoryId);
        $products = $this->syteService->getProductsPagination($categoryId);

        return $this->render('category', [
            'products' => $products,
            'pages' => $pages,
        ]);
    }

    public function actionContact()
    {
        $contact = new Contact();
        $contact->scenario = Contact::SCENARIO_USER_CONTACT;

        if (Yii::$app->request->isPost && $contact->load(Yii::$app->request->post()) && $contact->validate()) {
            try {
                $this->syteService->sendLetter($contact);
                Yii::$app->getSession()->setFlash('success', 'Письмо отправлено успешно');
                return $this->redirect(['syte/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('contact', [
            'contact' => $contact,
        ]);
    }

}