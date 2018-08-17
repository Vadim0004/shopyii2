<?php
namespace backend\controllers;

use backend\models\general\AdminBase;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    use AdminBase;
    public function actionIndex()
    {
        self::checkAdmin();
        return $this->render('index');
    }
}
