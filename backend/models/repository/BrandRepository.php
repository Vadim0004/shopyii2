<?php

namespace backend\models\repository;

use common\models\activerecord\Brand;

class BrandRepository
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     *
     */
    public function getAllBrands()
    {
        $brand = Brand::find()->all();
        if ($brand) {
            return $brand;
        } else {
            throw new \DomainException('Brands Not found');
        }
    }

    /**
     * @param Brand $brand
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function save(Brand $brand)
    {
        if ($brand->save()) {
            return true;
        } else {
            throw new \RuntimeException('Saving error.');
        }
    }

    /**
     * @param Brand $brand
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function delete(Brand $brand)
    {
        if ($brand->delete()) {
            return true;
        } else {
            throw new \RuntimeException('Delete error.');
        }
    }

    /**
     * @param int $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getOneItemBrand(int $id)
    {
        $brand = Brand::find()
            ->andWhere(['id' => $id])
            ->limit(1)
            ->one();
        if (!$brand) {
            throw new NotFoundException('Brand is not found.');
        }
        return $brand;
    }
}