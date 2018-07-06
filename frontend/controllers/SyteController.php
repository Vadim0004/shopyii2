<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Contact;
use yii\web\Controller;
use frontend\components\Pagination;
use frontend\models\repository\Productrepository;
use frontend\services\syte\SyteService;

class SyteController extends Controller
{
    public function actionIndex($page = 1)
    {   
        $offset = ($page - 1) * Yii::$app->params['showByDefailtProducts'];

        $productRepository = new Productrepository();  
        $latestProducts = $productRepository->getTotalProductsCategory($offset);
        
        $total = $productRepository->getCountProductsCategory();
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

        $productRepository = new Productrepository();
        $categoryProducts = $productRepository->getProductsListByCategory($categoryId, $offset);
        
        $total = $productRepository->getCountProductsByCategory($categoryId);
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
        $letterTheme = 'Hi admin';
        
        if (Yii::$app->request->isPost) {
            $contact->attributes = $formData['Contact'];
            if ($contact->validate()) {
                try {
                    (new SyteService(Yii::$app->params['adminEmail'], $contact, $letterTheme))->sendLetter();
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