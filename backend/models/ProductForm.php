<?php

namespace backend\models;

use yii\base\Model;
use common\models\activerecord\Product as ProductActive;

class ProductForm extends Model
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

    private $_product;

    public function __construct(ProductActive $_product = null, $config = [])
    {
        if ($_product) {
            $this->name = $_product->name;
            $this->category_id = $_product->category_id;
            $this->code = $_product->code;
            $this->price = $_product->price;
            $this->availability = $_product->availability;
            $this->brand = $_product->brand;
            $this->description = $_product->description;
            $this->is_new = $_product->is_new;
            $this->is_recommended = $_product->is_recommended;
            $this->status = $_product->status;
            $this->quantity = $_product->quantity;
            $this->_product = $_product;
        }
        parent::__construct($config);
    }

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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'category_id' => 'Категория',
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