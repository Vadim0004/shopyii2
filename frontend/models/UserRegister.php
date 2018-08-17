<?php

namespace frontend\models;

use yii\base\Model;
use common\models\activerecord\User;

class UserRegister extends Model
{
    const SCENARIO_USER_REGISTER = 'user_register';
    const SCENARIO_USER_LOGIN = 'user_login';
    const SCENARIO_USER_EDIT = 'user_edit';

    public $name;
    public $email;
    public $password;

    private $_user;

    public function __construct(User $_user = null, array $config = [])
    {
        if ($_user) {
            $this->name = $_user->name;
            $this->email = $_user->email;
            $this->password = $_user->password;
            $this->_user = $_user;
        }
        parent::__construct($config);
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_USER_REGISTER => ['name', 'email', 'password'],
            self::SCENARIO_USER_LOGIN => ['email', 'password'],
            self::SCENARIO_USER_EDIT => ['name', 'password'],
        ];
    }
    
    public function rules(): array
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['name'], 'string', 'min' => 2],
            [['email'], 'email'],
            [['password'], 'string', 'min' => 6],
            [['email'], 'unique', 'targetClass' => User::class, 'filter' => $this->_user ? ['<>', 'id', $this->_user->id] : null, 'on' => self::SCENARIO_USER_REGISTER]
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
