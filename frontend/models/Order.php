<?php

namespace frontend\models;

use Yii;

class Order
{
    public static function getOrdersByAuthorId($id)
    {
        $id = intval($id);
        if ($id) {
            $sql = "SELECT * FROM product_order WHERE user_id = :user_id";
            $result = Yii::$app->db->createCommand($sql)->bindParam('user_id', $id)->queryAll();
            return $result;
        }
    }
    
    /**
     * Возвращает по номеру статуса заказ в каком он состоянии
     * @param type $name <p>Номер стаутса из БД щрдеров</p>
     */
    public static function getNameStatusOrder($name)
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