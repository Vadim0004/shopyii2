<?php

namespace frontend\models;

use Yii;

class Order
{
 
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