<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\repository\Productrepository;

class CatalogController extends Controller
{
	private $productRepository;

	public function __construct($id, $module, Productrepository $productRepository, array $config = [])
	{
		$this->productRepository = $productRepository;
		parent::__construct($id, $module, $config);
	}

	public function actionIndex()
    {
        $latestProducts = $this->productRepository->getLatestProducts();
        $recomend = $this->productRepository->getRecommendedProducts();
        
        return $this->render('index', [
            'latestProducts' => $latestProducts,
            'recomend' => $recomend,
        ]);
    }
    
}