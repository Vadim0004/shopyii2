<?php

namespace backend\models;

use yii\base\Model;

class Product extends Model
{
    public $id;
    public $name;
    public $category;
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
            [['name', 'category', 'code', 'price', 'availability', 'brand', 'description'], 'required'],
            [['category', 'code', 'availability', 'is_new', 'is_recommended', 'status', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brand'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'category' => 'Категория',
            'code' => 'Артикул',
            'price' => 'Цена',
            'availability' => 'наличие',
            'brand' => 'бренд',
            'description' => 'Описние',
            'is_new' => 'Новинка',
            'is_recommended' => 'Рекомендуемый',
            'status' => 'Отображение',
            'quantity' => 'Количество',
        ];
    }
}