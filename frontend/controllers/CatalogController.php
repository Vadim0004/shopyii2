<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\repository\Productrepository;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $productRepository = new Productrepository();
        $latestProducts = $productRepository->getLatestProducts();
        
        $recomend = $productRepository->getRecommendedProducts();
        
        return $this->render('index', [
            'latestProducts' => $latestProducts,
            'recomend' => $recomend,
        ]);
    }
    
}