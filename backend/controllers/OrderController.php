<?php

namespace backend\controllers;

use backend\service\order\OrderService;
use yii\web\Controller;
use backend\models\general\AdminBase;

class OrderController extends Controller
{
    use AdminBase;
    private $orderService;

    public function __construct($id,
                                $module,
                                OrderService $orderService,
                                array $config = [])
    {
        $this->orderService = $orderService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        self::checkAdmin();
        $userByOrder = $this->orderService->getAllOrdersByIdUser();

        return $this->render('index', [
            'userByOrder' => $userByOrder,
        ]);
    }

}
