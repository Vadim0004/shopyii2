<?php

namespace frontend\models\repository;

use common\models\activerecord\ProductOrder;

class Productorderrepository
{
    /**
     * 
     * @param int $id
     * @return array ActiveQuery
     */
    
    public function getOrdersByAuthorId($id)
    {
        $orderList = ProductOrder::find()
                ->where(['user_id' => $id])
                ->all();
        
        return $orderList;
    }
    
    /**
     * Возвращает по номеру статуса заказ в каком он состоянии
     * @param int $name <p>Номер стаутса из БД щрдеров</p>
     */
    public static function getNameStatusOrder(int $name)
    {
        switch ($name) {
            case "1":
                echo "Новый заказ";
                break;
            case "2":
                echo "В ожидании";
                break;
            case "3":
                echo "Отправлен";
                break;
        }
    }
}