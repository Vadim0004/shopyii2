<?php

namespace backend\models;

use yii\base\Model;
use common\models\activerecord\Category as CategoryActive;

class CategoryForm extends Model
{
    public $id;
    public $name;
    public $sort_order;
    public $status;

    private $_category;

    public function __construct(CategoryActive $_category = null, $config = [])
    {
        if ($_category) {
            $this->name = $_category->name;
            $this->sort_order = $_category->sort_order;
            $this->status = $_category->status;
            $this->_category = $_category;
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