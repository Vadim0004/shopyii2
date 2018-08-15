<?php

namespace backend\models\repository;

use common\models\activerecord\ProductOrder;

class ProductOrderRepository
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllOrders()
    {
        $orders = ProductOrder::find()->all();
        return $orders;
    }

}