<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\repository\ProductRepository;

class ProductController extends Controller
{
    private $repository;

    public function __construct($id, $module, ProductRepository $repository, $config = [])
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($id)
    {
        $product = $this->repository->getProductById($id);

        return $this->render('index', [
            'product' => $product,
        ]);
    }
}