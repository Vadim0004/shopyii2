<?php

namespace backend\models;

use yii\base\Model;

class Category extends Model
{
    public $id;
    public $name;
    public $sort_order;
    public $status;

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