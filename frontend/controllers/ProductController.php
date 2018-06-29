<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\repository\Productrepository;

class ProductController extends Controller
{
    public function actionIndex($id)
    {
        $id = intval($id);
        $productRepository = new Productrepository();
        $product = $productRepository->getProductById($id);
        
        return $this->render('index', [
            'product' => $product,
        ]);
    }
}