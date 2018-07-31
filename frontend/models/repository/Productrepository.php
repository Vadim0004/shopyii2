<?php
namespace frontend\models\repository;

use common\models\activerecord\Product;
use Yii;

class Productrepository
{
    /**
     * 
     * @param int $offset
     * @return array ActiveQuery
     */
    public function getTotalProductsCategory(int $offset)
    {
        $latestProducts = Product::find()
                ->where(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->limit(Yii::$app->params['showByDefailtProducts'])
                ->offset($offset)
                ->all();
        
        return $latestProducts;
    }
    
    /**
     * 
     * @return int ActiveQuery
     */
    public function getCountProductsCategory()
    {
        $total = Product::find()
                ->where(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->count();
        
        return $total;
    }
    
    /**
     * 
     * @return array ActiveQuery
     */
    public function getRecommendedProducts()
    {
        $recomend = Product::find()
                ->where(['is_recommended' => 1])
                ->andWhere(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->all();
        
        return $recomend;
    }
    
    /**
     * 
     * @param int $categoryId
     * @param int $offset
     * @return array ActiveQuery
     */
    public function getProductsListByCategory(int $categoryId, int $offset)
    {
        $categoryProducts = Product::find()
                ->where(['category_id' => $categoryId])
                ->orderBy(['id' => SORT_DESC])
                ->limit(Yii::$app->params['showByDefailtProducts'])
                ->offset($offset)
                ->all();
        
        return $categoryProducts;
    }
    
    /**
     * 
     * @param int $categoryId
     * @return int ActiveQuery
     */
    public function getCountProductsByCategory(int $categoryId)
    {
        $total = Product::find()
                ->where(['category_id' => $categoryId])
                ->andWhere(['status' => 1])
                ->count();
        
        return $total;
    }
    
    /**
     * 
     * @param int $id
     * @return array ActiveQuery
     */
    public function getProductById(int $id)
    {
        $product = Product::find()
                ->where(['id' => $id])
                ->andWhere(['status' => 1])
                ->one();
        
        return $product;
    }
    
    /**
     * 
     * @return array ActiveQuery
     */
    public function getLatestProducts()
    {
        $product = Product::find()
                ->where(['status' => 1])
                ->orderBy(['id' => SORT_DESC])
                ->all();
        
        return $product;
    }
    
    /**
     * 
     * @param array $ids
     * @return array ActiveQuery
     */
    public function getAllProductById(array $ids)
    {
        $products = Product::find()->where(['id' => $ids])->asArray()->all();
        
        return $products;
    }
    
    /**
     * Возвращает путь к продукту
     * @param int $id <p>id продукта</p>
     * @return string
     */
    public static function getImage(int $id)
    {
        $id = intval($id);
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        $alias = Yii::getAlias('@images');
        
        $noImagePath = "$alias/$noImage";

        // Путь к изображению товара
        $pathToProductImage = $alias . "/$id" . '.jpg';
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
     * @param int $quantity <p>Число продуктов</p>
     * @param int $price <p>Цена продута</p>
     * @return float|int
     */
    public static function totalPriceProducts(int $quantity, int $price)
    {
        $result = $quantity * $price;
        return $result;
    }
}