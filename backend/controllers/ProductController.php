<?php

namespace backend\controllers;

use backend\models\repository\CategoryRepository;
use backend\service\product\ProductService;
use Yii;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\Product;

class ProductController extends \yii\web\Controller
{
    private $categoryRepository;
	private $productService;

    public function __construct($id,
                                $module,
                                CategoryRepository $categoryRepository,
                                ProductService $productService,
                                array $config = [])
    {
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $products = $this->productService->getAllProducts();
        return $this->render('index', [
            'products' => $products,
        ]);
    }

    public function actionCreate()
    {
        return $this->render('create', [

        ]);
    }

    public function actionUpdate($id)
    {
        $product = $this->productService->getProductsById($id);
        $category = $this->categoryRepository->getCategoryList();
		$formData = yii::$app->request->post();
        $model = new UploadForm();
        $modelProduct = new Product();
        if (yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $modelProduct->attributes = $formData;
            if ($modelProduct->validate()) {
                $this->productService->productEdit($modelProduct, $product);
                $model->upload($product);
                Yii::$app->getSession()->setFlash('success', 'Продукт отредактирован успешно');
                $this->redirect(['product/index']);
            }
        }

        return $this->render('update', [
            'product' => $product,
            'category' => $category,
            'model' => $model,
            'modelProduct' => $modelProduct,
        ]);
    }

    public function actionDelete($id)
    {
        return $this->render('delete', [

        ]);
    }
}
