<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Checkout extends Model
{
    const SCENARIO_CHECKOUT_SEND = 'checkout_send';
    
    public $userName;
    public $userPhone;
    public $userComment;
    
    public function scenarios() 
    {
        return [
            self::SCENARIO_CHECKOUT_SEND => ['userName', 'userPhone', 'userComment'],
        ];
    }

        public function rules() 
    {
        return [
            [['userName', 'userPhone', 'userComment'], 'required'],
            [['userName'], 'string', 'min' => 2],
            [['userPhone'], 'integer', 'min' => 11],
            [['userComment'], 'string', 'min' => 25],
        ];
    }
    
    public function save($userId, $productsInCart)
    {
        $userId = intval($userId);

        if ($userId) {
            
            $productsInCart = json_encode($productsInCart);

            $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES ('{$this->userName}', '{$this->userPhone}', '{$this->userComment}', '{$userId}', '{$productsInCart}')";
            return Yii::$app->db->createCommand($sql)->execute();
        }
    }
}