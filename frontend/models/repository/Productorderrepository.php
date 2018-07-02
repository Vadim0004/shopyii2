<?php

namespace frontend\models\repository;

use frontend\models\activerecord\ProductOrder;

class Productorderrepository
{
    /**
     * 
     * @param int $id
     * @return array ActiveQuery
     */
    
    public function getOrdersByAuthorId($id)
    {
        $orderList = ProductOrder::find()->where(['user_id' => $id])->all();
        
        return $orderList;
    }
}