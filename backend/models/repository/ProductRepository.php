<?php

namespace backend\models\repository;

use common\models\activerecord\Product;

class ProductRepository
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllProducts()
    {
        $products = Product::find()
            ->orderBy(['id' => SORT_DESC])
            ->all();
        return $products;
    }

    /**
     * @param int $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getProductsById(int $id)
    {
        $product = Product::find()
            ->where(['id' => $id])
            ->one();
        return $product;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function save(Product $product)
    {
        if ($product->save()) {
            return true;
        } else {
            throw new \RuntimeException('Saving error. AddressBook');
        }
    }
}