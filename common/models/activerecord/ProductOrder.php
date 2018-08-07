<?php

namespace common\models\activerecord;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "product_order".
 *
 * @property int $id
 * @property string $user_name
 * @property string $user_phone
 * @property string $user_comment
 * @property int $user_id
 * @property string $date
 * @property string $products
 * @property int $status
 * @property float $value
 */
class ProductOrder extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'user_phone', 'user_comment', 'products'], 'required'],
            [['user_comment', 'products'], 'string'],
            [['user_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['user_name', 'user_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'user_comment' => 'User Comment',
            'user_id' => 'User ID',
            'date' => 'Date',
            'products' => 'Products',
            'status' => 'Status',
        ];
    }
    
    public function orderSave(int $userId, array $productsInCart, string $user_name, $user_phone, string $user_comment, float $totalPrice)
    {
        $chekout = new Static();
        $productsInCart = json_encode($productsInCart);
        $chekout->user_id = $userId;
        $chekout->user_name = $user_name;
        $chekout->user_phone = $user_phone;
        $chekout->user_comment = $user_comment;
        $chekout->products = $productsInCart;
        $chekout->value = $totalPrice;

        return $chekout;
    }
}
