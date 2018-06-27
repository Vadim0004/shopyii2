<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Category;
use frontend\models\Product;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $categories = [];
        $categories = Category::getCategoriesList();

        
        $latestProducts = [];
        $latestProducts = Product::getProducts(6);
        
        $recomend = [];
        $recomend = Product::getRecommendedProducts();
        
        return $this->render('index', [
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'recomend' => $recomend,
        ]);
    }
    
}