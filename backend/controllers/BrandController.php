<?php

namespace backend\controllers;

use backend\models\general\AdminBase;
use yii\web\Controller;
use backend\models\BrandForm;
use yii;
use backend\service\brand\BrandService;
use yii\web\Response;
use yii\helpers\Url;

class BrandController extends Controller
{
    use AdminBase;
    private $branService;

    public function __construct($id, $module, BrandService $brandService, array $config = [])
    {
        $this->branService = $brandService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        self::checkAdmin();
        $brand = [];
        $url = Url::to(['brand/ajax']);
        try {
            $brand = $this->branService->getAllBrands();
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->render('index', [
            'url' => $url,
            'brand' => $brand,
        ]);
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $form = new BrandForm();

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->branService->saveBrand($form);
                Yii::$app->getSession()->setFlash('success', 'Brand успешно сохранен');
                return $this->redirect(['brand/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        $brand = $this->branService->getOneBrand($id);
        $form = new BrandForm($brand);

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->branService->updateBrand($brand, $form);
                Yii::$app->getSession()->setFlash('success', 'Brand успешно отредактирован');
                return $this->redirect(['brand/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render( 'update', [
            'model' => $form,
        ]);
    }

    public function actionDelete($id)
    {
        $id = intval($id);
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {

            try {
                $this->branService->deleteBrand($id);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->renderAjax('delete', [
            'id' => $id,
        ]);
    }

    public function actionTest()
    {
        self::checkAdmin();
        $form = new BrandForm();

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->branService->saveBrand($form);
                Yii::$app->getSession()->setFlash('success', 'Brand успешно сохранен');
                return $this->redirect(['brand/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->renderAjax('test', [
            'model' => $form,
        ]);
    }

    public function actionAjax()
    {
        $f = new BrandForm();
        if (yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $f->load($post);
            echo '<pre>';
            var_dump($f);
            echo '</pre>';
            die();
        }
    }
}