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

    /**
     * @param int $id
     * @return ProductOrderRepository
     */
    public function getOrderById(int $id): ProductOrder
    {
        $order = ProductOrder::find()
            ->where(['id' => $id])
            ->one();
        if ($order) {
            return $order;
        } else {
            throw new \DomainException('Orders Not found');
        }
    }
}