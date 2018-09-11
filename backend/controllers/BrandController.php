<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\BrandForm;
use yii;

class BrandController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

    public function actionCreate()
    {
        $form = new BrandForm();

        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->validate()) {

        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }
}