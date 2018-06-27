<?php

namespace frontend\models\example;

use yii\base\Model;

class Testdbmodel extends Model
{
    public $title;
    public $content;
    public $status;

    public function rules() 
    {
        return [
            [['title', 'content', 'status'], 'required'],
            [['status'], 'integer'],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Контент',
            'status' => 'Число',
        ];
    }
}