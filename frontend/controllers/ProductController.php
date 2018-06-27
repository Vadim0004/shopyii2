<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Category;
use frontend\models\Product;

class ProductController extends Controller
{
    public function actionIndex($id)
    {
        $id = intval($id);
        
        $categories = Category::getCategoriesList();
        
        $product = Product::getProductById($id);
        
        return $this->render('index', [
            'id' => $id,
            'categories' => $categories,
            'product' => $product,
        ]);
    }
}