<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Contact;
use yii\web\Controller;
use frontend\models\Category;
use frontend\models\Product;
use frontend\components\Pagination;
use frontend\models\activerecor\Categoryactive;
use frontend\models\example\Testdb;
use frontend\models\example\Testdbmodel;

class SyteController extends Controller
{
    public function actionIndex($page = 1)
    {   
        $latestProducts = [];
        $latestProducts = Product::getLatestProducts(6, $page);
        
        $total = Product::getTotalProductsCategory();
        
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        $recomend = [];
        $recomend = Product::getRecommendedProducts();

        return $this->render('index', [
            'latestProducts' => $latestProducts, 
            'total' => $total,
            'recomend' => $recomend,
            'pagination' => $pagination,
        ]);
    }
    
    public function actionCategory($categoryId, $page = 1)
    {
        $categoryProducts = [];
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        return $this->render('category', [
            'categoryId' => $categoryId,
            'categoryProducts' => $categoryProducts,
            'total' => $total,
        ]);
    }
    
    public function actionContact()
    {
        $contact = new Contact();
        $contact->scenario = Contact::SCENARIO_USER_CONTACT;
        
        $formData = Yii::$app->request->post();
        
        $result = false;
        
        if (Yii::$app->request->isPost) {
            $contact->attributes = $formData['Contact'];
            
            if ($errors == false) {
                $adminEmail = 'vadimtestacc@gmail.com';
                $message = "Tекст: {$userText} . от {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        
        return $this->render('contact', [
            'contact' => $contact,
            'result' => $result,
        ]);
    }
    
    public function actionActiverecord()
    {
        /* $var $testDbModel extends base/Model*/
        $testDbModel = new Testdbmodel();
        
        if ($testDbModel->load(Yii::$app->request->post()) && $testDbModel->validate()) {
            /*
            echo '<pre>';
            print_r($testDbModel);
            echo '</pre>';
             * 
             */
            /* $var $testDbModel extends ActiveRecord*/
            $testDb = new Testdb();
            $testDb->title = $testDbModel['title'];
            $testDb->content = $testDbModel['content'];
            $testDb->status = $testDbModel['status'];
            $testDb->save();
            Yii::$app->session->setFlash('success', 'saved');
            
            return $this->redirect(['syte/index']);
        }
        
        return $this->render('activerecord', [
            'testDbModel' => $testDbModel,
            'testDb' => $testDb,
        ]);
    }
    
    
}