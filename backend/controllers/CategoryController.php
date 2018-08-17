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
        $form = new Category();
        $formLabel = $form->attributeLabels();

        if (Yii::$app->request->post() && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->categoryService->saveCategory($form);
                Yii::$app->getSession()->setFlash('success', 'Категория успешно сохранена');
                return $this->redirect(['category/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }

        }

        return $this->render('create', [
            'model' => $form,
            'formLabel' => $formLabel,
        ]);
    }

    public function actionUpdate($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        $form = new Category($category);
        $formLabel = $form->attributeLabels();

        if (Yii::$app->request->post() && $form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->categoryService->editCategory($category, $form);
                Yii::$app->getSession()->setFlash('success', 'Категория откорректирована успешно');
                $this->redirect(['category/index']);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('update', [
            'model' => $form,
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
