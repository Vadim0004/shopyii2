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
        $category = $this->categoryRepository->getCategoryList();
        $formData = yii::$app->request->post();
        $model = new UploadForm();
        $modelProduct = new Product();
        $formAttrLable = $modelProduct->attributeLabels();
        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $modelProduct->attributes = $formData['Product'];
            if ($modelProduct->validate()) {
                try {
                    $this->productService->productSave($modelProduct);
                    $product = $this->productService->getAddLatestProduct();
                    $model->upload($product);
                    Yii::$app->getSession()->setFlash('success', 'Продукт отредактирован успешно');
                    $this->redirect(['product/index']);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('create', [
            'category' => $category,
            'modelProduct' => $modelProduct,
            'formAttrLable' => $formAttrLable,
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $product = $this->productService->getProductsById($id);
        $category = $this->categoryRepository->getCategoryList();
        $formData = yii::$app->request->post();
        $model = new UploadForm();
        $modelProduct = new Product();
        $formAttrLable = $modelProduct->attributeLabels();
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
            'formAttrLable' => $formAttrLable,
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->productService->productDelete($id);
            Yii::$app->getSession()->setFlash('success', 'Продукт удален успешно');
            $this->redirect(['product/index']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}
