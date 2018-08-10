<?php

namespace backend\controllers;

use backend\models\repository\CategoryRepository;
use backend\models\repository\ProductRepository;
use Yii;
use backend\models\UploadForm;
use yii\web\UploadedFile;

class ProductController extends \yii\web\Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct($id,
                                $module,
                                ProductRepository $productRepository,
                                CategoryRepository $categoryRepository,
                                array $config = [])
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $products = $this->productRepository->getAllProducts();
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
        $product = $this->productRepository->getProductsById($id);
        $category = $this->categoryRepository->getCategoryList();
        $formData = yii::$app->request->post();
        $model = new UploadForm();

        if (yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
        }

        return $this->render('update', [
            'product' => $product,
            'category' => $category,
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        return $this->render('delete', [

        ]);
    }
}
