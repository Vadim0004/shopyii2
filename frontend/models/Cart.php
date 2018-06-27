<?php
namespace frontend\models;

use Yii;

class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        
        // Пустой массив для товаров в корзине
        $productsInCart = [];
        
        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset(Yii::$app->session['products'])) {
            // То заполним наш массив товарами
            $productsInCart = Yii::$app->session['products'];
        }
        
        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            // Добавляем новый товар в корзину
            $productsInCart[$id] = 1;
        }
        
        Yii::$app->session['products'] = $productsInCart;

        return self::countItems();
    }
    
    public static function countItems()
    {
        if (isset(Yii::$app->session['products'])) {
            $count = 0;
            foreach (Yii::$app->session['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
    
    public static function getProducts()
    {
        if (isset(Yii::$app->session['products'])) {
            return Yii::$app->session['products'];
        } else {
            return false;
        }
    }
    
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        
        $total = 0;
        
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] *$productsInCart[$item['id']];
            }
        }
        
        return $total;
    }
    
    /**
    * Удаляет товар с указанным id из корзины
    * @param integer $id <p>id товара</p>
    */
    public static function deleteProduct($id)
    {
        // Получаем массив с идентификатором и количеством товаров в корзине
        $productsInCart = self::getProducts();
        
        // Удаляем из массива элемент с укзаным id
        unset($productsInCart[$id]);
        
        // Записываем массив товаров с удаленным элементом в сессию
        Yii::$app->session['products'] = $productsInCart;
    }
    
    /**
     * Удаляем из сессии $_SESSION['products']
     */
    public static function clear()
    {
        if (isset(Yii::$app->session['products'])) {
            unset(Yii::$app->session['products']);
        }
    }
    
}