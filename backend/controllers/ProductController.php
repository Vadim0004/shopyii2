<?php

namespace backend\controllers;

use backend\service\product\ProductService;
use backend\service\category\CategoryService;
use Yii;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\Product;
use backend\models\general\AdminBase;
use yii\web\Response;
use yii\helpers\Url;

class ProductController extends \yii\web\Controller
{
    use AdminBase;
    private $categoryService;
    private $productService;

    public function __construct($id,
                                $module,
                                CategoryService $categoryService,
                                ProductService $productService,
                                array $config = [])
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        self::checkAdmin();
        $url = Url::to(['product/delete-ajax']);
        $pages = $this->productService->getPagination();
        $products = $this->productService->getProductsPagination($pages->offset, $pages->limit);

        return $this->render('index', [
            'products' => $products,
            'pages' => $pages,
            'url' => $url,
        ]);
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $category = $this->categoryService->getAllCategorys();
        $formImage = new UploadForm();
        $form = new Product();
        $formAttrLable = $form->attributeLabels();

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            $formImage->image = UploadedFile::getInstance($formImage, 'image');
            try {
                $this->productService->productSave($form);
                $product = $this->productService->getAddLatestProduct();
                $formImage->upload($product);
                Yii::$app->getSession()->setFlash('success', 'Продукт успешно сохранен');
                $this->redirect(['product/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('create', [
            'category' => $category,
            'modelImage' => $formImage,
            'formAttrLable' => $formAttrLable,
            'model' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $product = $this->productService->getProductsById($id);
        $category = $this->categoryService->getAllCategorys();
        $formImage = new UploadForm();
        $form = new Product($product);
        $formAttrLable = $form->attributeLabels();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            $formImage->image = UploadedFile::getInstance($formImage, 'image');
            try {
                $this->productService->productEdit($form, $product);
                $formImage->upload($product);
                Yii::$app->getSession()->setFlash('success', 'Продукт отредактирован успешно');
                $this->redirect(['product/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('update', [
            'category' => $category,
            'product' => $product,
            'modelImage' => $formImage,
            'formAttrLable' => $formAttrLable,
            'model' => $form,
        ]);
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        try {
            $this->productService->productDelete($id);
            Yii::$app->getSession()->setFlash('success', 'Продукт удален успешно');
            $this->redirect(['product/index']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    public function actionDeleteAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $productId = Yii::$app->request->post('product_id');
        try {
            $pages = $this->productService->getPagination();
            $products = $this->productService->deleteProductAjax($productId, $pages->offset, $pages->limit);
            return $this->renderAjax('deleteAjax', [
                'products' => $products,
            ]);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}
