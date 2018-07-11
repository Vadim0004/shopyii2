<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\repository\Productrepository;
use frontend\models\Product;
use Yii;

class ProductController extends Controller
{
    private $repository;

    public function __construct($id, 
            $module, 
            Productrepository $repository, 
            $config = []) 
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

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