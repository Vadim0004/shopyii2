<?php

namespace backend\controllers;

use backend\service\order\OrderService;
use yii\web\Controller;
use backend\models\general\AdminBase;
use Yii;

class OrderController extends Controller
{
    use AdminBase;
    private $orderService;

    public function __construct($id, $module, OrderService $orderService, array $config = [])
    {
        $this->orderService = $orderService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        self::checkAdmin();
        try {
            $userByOrder = false;
            $userByOrder = $this->orderService->getAllOrdersByIdUser();
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->render('index', [
            'userByOrder' => $userByOrder,
        ]);
    }

}
