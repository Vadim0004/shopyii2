<?php

namespace frontend\models\repository;

use common\models\activerecord\ProductOrder;

class ProductOrderRepository
{
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

    public function save(ProductOrder $checkout)
    {
        if ($checkout->save()) {
            return true;
        } else {
            throw new \RuntimeException('Saving checkout error.');
        }
    }
}