<?php

namespace frontend\models;

use Yii;

class Product
{

    const SHOW_BY_DEFAULT = 6;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page - 1) * $count;
        
        $sql = 'SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" '
                . 'ORDER BY id DESC '                
                . 'LIMIT ' . $count
                . ' OFFSET '. $offset;
        
        $productsList = Yii::$app->db->createCommand($sql)->queryAll();
        
        return $productsList;
    }
    
        /**
     * Returns an array of products
     */
    public static function getProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        
        $sql = 'SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" '
                . 'ORDER BY id DESC '                
                . 'LIMIT ' . $count;
        
        $productsList = Yii::$app->db->createCommand($sql)->queryAll();
        
        return $productsList;
    }
    
    /**
     * Возвращает количество всех продуктов
     * @return type INT
     */
    
    public static function getTotalProductsCategory()
    {
        $sql = 'SELECT count(id) AS count FROM product '
                . 'WHERE status="1" ORDER BY id DESC';

        $result = Yii::$app->db->createCommand($sql)->queryAll();
        
        return $result[0]['count'];
    }
    
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
     * Returns an array of recommended products
     */
    public static function getRecommendedProducts()
    {
        $sql = 'SELECT id, name, price, is_new FROM product '
                . 'WHERE status = "1" AND is_recommended = "1" '
                . 'ORDER BY id DESC ';
        
        $productsList = Yii::$app->db->createCommand($sql)->queryAll();

        return $productsList;
    }
    
    /**
     * Returns an array of products
     */
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            
            $page = intval($page);            
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            
            $sql = "SELECT id, name, price, is_new FROM product "
                    . "WHERE status = '1' AND category_id = '$categoryId' "
                    . "ORDER BY id ASC "                
                    . "LIMIT ".self::SHOW_BY_DEFAULT
                    . ' OFFSET '. $offset;
            
            $products = [];
            
            $products = Yii::$app->db->createCommand($sql)->queryAll();

            return $products;
        }
    }
    
    /**
     * Returns total products
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $categoryId = intval($categoryId);

        $sql = 'SELECT count(id) AS count FROM product '
                . 'WHERE status="1" AND category_id ="'.$categoryId.'"';
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return $result[0]['count'];
    }
    
    
    public static function getProductById($id)
    {
        $id = intval($id);
        
        if ($id) {
            $sql = 'SELECT * FROM product WHERE id = :id';
            $productById = Yii::$app->db->createCommand($sql)->bindParam(":id", $id)->queryOne();
            return $productById;
        }
        
    }
    
    public static function getProdustsByIds(array $idsArray)
    {
        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(', ', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ({$idsString}) ";
        $products = Yii::$app->db->createCommand($sql)->queryAll();
        return $products;
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