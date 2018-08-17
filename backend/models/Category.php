<?php

namespace backend\models;

use yii\base\Model;
use common\models\activerecord\Category as CategoryActive;

class Category extends Model
{
    public $id;
    public $name;
    public $sort_order;
    public $status;

    public function __construct(CategoryActive $category = null, $config = [])
    {
        if ($category) {
            $this->name = $category->name;
            $this->sort_order = $category->sort_order;
            $this->status = $category->status;
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort_order', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя категории',
            'sort_order' => 'Порядковый номер',
            'status' => 'Статус',
        ];
    }
}