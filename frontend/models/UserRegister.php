<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class UserRegister extends Model
{
    const SCENARIO_USER_REGISTER = 'user_register';
    const SCENARIO_USER_LOGIN = 'user_login';
    const SCENARIO_USER_EDIT = 'user_edit';


    public $name;
    public $email;
    public $password;


    public function scenarios() 
    {
        return [
            self::SCENARIO_USER_REGISTER => ['name', 'email', 'password'],
            self::SCENARIO_USER_LOGIN => ['email', 'password'],
            self::SCENARIO_USER_EDIT => ['name', 'password'],
        ];
    }
    
    public function rules() 
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['name'], 'string', 'min' => 2],
            [['email'], 'email'],
            [['password'], 'string', 'min' => 6],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Почта',
            'password' => 'Пароль',
        ];
    }
    
}