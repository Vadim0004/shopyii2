<?php

namespace frontend\models\activerecord;

use Yii;

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
 */
class ProductOrder extends \yii\db\ActiveRecord
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
    
    public function orderSave(int $userId, array $productsInCart, string $user_name, $user_phone, string $user_comment)
    {
        $productsInCart = json_encode($productsInCart);
        $this->user_id = $userId;
        $this->user_name = $user_name;
        $this->user_phone = $user_phone;
        $this->user_comment = $user_comment;
        $this->products = $productsInCart;
        $result = $this->save();
        
        return $result;
    }
}
