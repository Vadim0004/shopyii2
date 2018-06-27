<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Contact;
use yii\web\Controller;
use frontend\models\Category;
use frontend\components\Pagination;
use frontend\models\activerecord\Product;
use frontend\models\example\Testdb;
use frontend\models\example\Testdbmodel;

class SyteController extends Controller
{
    public function actionIndex($page = 1)
    {   
        $offset = ($page - 1) * Yii::$app->params['showByDefailtProducts'];
        
        $latestProducts = Product::find()
                ->where(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->limit(Yii::$app->params['showByDefailtProducts'])
                ->offset($offset)
                ->all();
        
        $total = Product::find()
                ->where(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->count();
        
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Yii::$app->params['showByDefailtProducts'], 'page-');
        
        $recomend = Product::find()
                ->where(['is_recommended' => 1])
                ->andWhere(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->all();

        return $this->render('index', [
            'latestProducts' => $latestProducts, 
            'total' => $total,
            'recomend' => $recomend,
            'pagination' => $pagination,
        ]);
    }
    
    public function actionCategory($categoryId, $page = 1)
    {
        $categoryProducts = Product::find()
                ->where(['category_id' => $categoryId])
                ->orderBy(['id' => SORT_DESC])
                ->limit(Yii::$app->params['showByDefailtProducts'])
                ->all();
        
        return $this->render('category', [
            'categoryId' => $categoryId,
            'categoryProducts' => $categoryProducts,
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
            if ($contact->validate()) {
                $adminEmail = Yii::$app->params['adminEmail'];
                    $message = "Tекст: {$contact->userText} . от {$contact->userEmail}";
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
    
}