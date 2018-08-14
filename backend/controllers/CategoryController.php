<?php

namespace backend\controllers;

use Yii;
use backend\service\category\CategoryService;
use backend\models\Category;

class CategoryController extends \yii\web\Controller
{
    private $categoryService;

    public function __construct($id,
                                $module,
                                CategoryService $categoryService,
                                array $config = [])
    {
        $this->categoryService = $categoryService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $categorys = $this->categoryService->getAllCategorys();

        return $this->render('index', [
            'categorys' => $categorys,
        ]);
    }

    public function actionCreate()
    {
        $modelCategory = new Category();
        $formLabel = $modelCategory->attributeLabels();
        $formData = yii::$app->request->post();

        if (Yii::$app->request->isPost) {
            $modelCategory->attributes = $formData['Category'];
            if ($modelCategory->validate()) {
                try {
                    $this->categoryService->saveCategory($modelCategory);
                    Yii::$app->getSession()->setFlash('success', 'Категория успешно сохранена');
                    return $this->redirect(['category/index']);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('create', [
            'modelCategory' => $modelCategory,
            'formLabel' => $formLabel,
        ]);
    }

    public function actionUpdate($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        $modelCategory = new Category();
        $formLabel = $modelCategory->attributeLabels();
        $formData = yii::$app->request->post();

        if (Yii::$app->request->post()) {
            $modelCategory->attributes = $formData;
            if ($modelCategory->validate()) {
                try {
                    $this->categoryService->editCategory($category, $modelCategory);
                    Yii::$app->getSession()->setFlash('success', 'Категория откорректирована успешно');
                    $this->redirect(['category/index']);
                } catch (\DomainException $e) {
                    Yii::$app->errorHandler->logException($e);
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('update', [
            'category' => $category,
            'modelCategory' => $modelCategory,
            'formLabel' => $formLabel,
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $this->categoryService->deleteCategory($id);
            Yii::$app->getSession()->setFlash('success', 'Категория удалена успешно');
            $this->redirect(['category/index']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}
