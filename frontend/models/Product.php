<?php

namespace frontend\models;

use Yii;

class Product
{
    
    /**
     * Возвращает путь к продукту
     * @param type $id <p>id продукта</p>
     * @return string
     */
    public static function getImage($id)
    {
        $id = intval($id);
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        $alias = Yii::getAlias('@images');
        
        $noImagePath = "$alias/no-image.jpg";

        // Путь к папке с товарами
        $path = Yii::getAlias('@images');

        // Путь к изображению товара
        $pathToProductImage = $path . "/$id" . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        } else {
            return $noImagePath;
        }
    }
    
    /**
     * Возвращает общую цену продуктов
     * @param type $quantity <p>Число продуктов</p>
     * @param type $price <p>Цена продута</p>
     * @return type
     */
    public static function totalPriceProducts($quantity, $price)
    {
        $result = $quantity * $price;
        return $result;
    }
    
}