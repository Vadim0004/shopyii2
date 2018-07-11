<?php

namespace frontend\models;

use yii\base\Model;

class Product extends Model 
{
    public $id;
    public $name;
    public $category_id;
    public $code;
    public $price;
    public $availability;
    public $brand;
    public $description;
    public $is_new;
    public $is_recommended;
    public $status;
    public $quantity;
    
    public function rules()
    {
        return [
            [['name', 'category_id', 'code', 'price', 'availability', 'brand', 'description'], 'required'],
            [['category_id', 'code', 'availability', 'is_new', 'is_recommended', 'status', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brand'], 'string', 'max' => 255],
        ];
    }
}
