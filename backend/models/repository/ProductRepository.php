<?php

namespace backend\models\repository;

use common\models\activerecord\Product;
use yii\db\ActiveQuery;

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
     * @return null|\yii\db\ActiveRecord
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

    /**
     * @return ActiveQuery
     */
    public function getQueryProductsPagination(): ActiveQuery
    {
        $query = Product::find()->orderBy(['id' => SORT_DESC]);
        return $query;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getProductPagination(int $offset, int $limit): array
    {
        $products = self::getQueryProductsPagination()->offset($offset)
            ->limit($limit)
            ->all();
        return $products;
    }

    /**
     * @param array $productId
     * @return array \yii\db\ActiveRecord
     */
    public function getProductListByArray(array $productId): array
    {
        $productArray = Product::find()->where(['id' => $productId])->all();
        return $productArray;
    }

    /**
     * @param array $ids
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllProductByIdArray(array $ids): array
    {
        $products = Product::find()
            ->where(['id' => $ids])
            ->asArray()
            ->all();

        return $products;
    }
}