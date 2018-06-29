<?php
namespace frontend\models\repository;

use frontend\models\activerecord\Product;
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
     * @return type array ActiveQuery
     */
    public function getProductById(int $id)
    {
        $product = Product::find()
                ->where(['id' => $id])
                ->andWhere(['status' => 1])
                ->one();
        
        return $product;
    }
}