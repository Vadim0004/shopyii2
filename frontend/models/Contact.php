<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Contact extends Model
{
    const SCENARIO_USER_CONTACT = 'user_contact';
    
    public $userEmail;
    public $userText;
    
    public function scenarios() 
    {
        return [
            self::SCENARIO_USER_CONTACT => ['userEmail', 'userText']
        ];
    }
    
    public function rules() 
    {
        return [
            [['userEmail', 'userText'], 'required'],
            [['userText'], 'string', 'min' => 20],
            [['userEmail'], 'email'],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'userEmail' => 'Почта',
            'userText' => 'Текстовое сообщение',
        ];
    }
}