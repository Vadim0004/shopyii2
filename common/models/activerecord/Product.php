<?php

namespace common\models\activerecord;

use yii\db\ActiveRecord;
use backend\models\Product as ProductModel;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int $code
 * @property double $price
 * @property int $availability
 * @property string $brand
 * @property string $description
 * @property int $is_new
 * @property int $is_recommended
 * @property int $status
 * @property int $quantity
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{product}}';
    }

    /**
     * @param Product $product
     * @param ProductModel $productForm
     * @return Product Active Record
     */
    public function saveProduct(Product $product, ProductModel $productForm)
    {
        $product->name = $productForm['name'];
        $product->category_id = $productForm['category'];
        $product->code = $productForm['code'];
        $product->price = $productForm['price'];
        $product->availability = $productForm['availability'];
        $product->brand = $productForm['brand'];
        $product->description = $productForm['description'];
        $product->is_new = $productForm['is_new'];
        $product->is_recommended = $productForm['is_recommended'];
        $product->status = $productForm['status'];

        return $product;
    }
}
