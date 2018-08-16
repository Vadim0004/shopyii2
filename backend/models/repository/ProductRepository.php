<?php

namespace backend\models\repository;

use common\models\activerecord\Product;

class ProductRepository
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllProducts(): array
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
        if (!$product) {
            throw new \NotFoundException('Product is not found.');
        }
        return $product;
    }

    /**
     * @param Product $product
     */
    public function save(Product $product)
    {
        if (!$product->save()) {
            throw new \RuntimeException('Saving error. product');
        }
    }

    /**
     * @param Product $product
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function delete(Product $product)
    {
        if (!$product->delete()) {
            throw new \RuntimeException('Delete error. product');
        }
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getLatestAddProduct()
    {
        $Product = Product::find()
            ->orderBy(['id' => SORT_DESC])
            ->one();
        return $Product;
    }
}