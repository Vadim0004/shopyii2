<?php

namespace frontend\models;

use yii\base\Model;

class Bookmodel extends Model
{
    public $name;
    public $isbn;
    public $date_published;
    
    public function rules()
    {
        return [
            [['name', 'isbn', 'date_published'], 'required'],
            [['name'], 'string', 'min' => 10],
            [['isbn'], 'integer', 'min' => 3],
            [['date_published'], 'date', 'format' => 'php:Y-m-d']
        ];   
    }
    
    public function attributeLabels() 
    {
        return [
            'name' => 'Имя книги',
            'isbn' => 'Номер',
            'date_published' => 'Дата публикации',
        ];
    }
}