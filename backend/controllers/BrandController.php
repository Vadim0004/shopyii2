<?php

namespace backend\controllers;

use backend\models\general\AdminBase;
use yii\web\Controller;
use backend\models\BrandForm;
use yii;
use backend\service\brand\BrandService;

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
        try {
            $brand = $this->branService->getAllBrands();
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->render('index', [
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
}