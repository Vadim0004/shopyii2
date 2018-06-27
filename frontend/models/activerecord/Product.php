<?php

namespace frontend\models\activerecord;

use Yii;

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
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'code', 'price', 'availability', 'brand', 'description'], 'required'],
            [['category_id', 'code', 'availability', 'is_new', 'is_recommended', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brand'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'code' => 'Code',
            'price' => 'Price',
            'availability' => 'Availability',
            'brand' => 'Brand',
            'description' => 'Description',
            'is_new' => 'Is New',
            'is_recommended' => 'Is Recommended',
            'status' => 'Status',
        ];
    }
}
