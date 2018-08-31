<?php

namespace backend\controllers;

use Yii;
use backend\service\category\CategoryService;
use backend\models\Category;
use backend\models\general\AdminBase;
use yii\web\Response;

class CategoryController extends \yii\web\Controller
{
    use AdminBase;
    private $categoryService;
    public function __construct($id, $module, CategoryService $categoryService, array $config = [])
    {
        $this->categoryService = $categoryService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        self::checkAdmin();
        $categorys = $this->categoryService->getAllCategorys();

        return $this->render('index', [
            'categorys' => $categorys,
        ]);
    }

    public function actionCreate()
    {
        self::checkAdmin();
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
        self::checkAdmin();
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
        self::checkAdmin();
        try {
            $this->categoryService->deleteCategory($id);
            Yii::$app->getSession()->setFlash('success', 'Категория удалена успешно');
            $this->redirect(['category/index']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    public function actionDeleteAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $categoryId = Yii::$app->request->post('category_id');
        try {
            $category = $this->categoryService->deleteCategoryAjax($categoryId);
            return $this->renderAjax('deleteAjax', [
                'categorys' => $category,
            ]);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }
}
