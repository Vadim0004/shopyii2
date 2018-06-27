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

    public function checkExistEmailInDb()
    {
        $sql = "SELECT count(*) FROM user WHERE email = '{$this->email}'";
        $result =  Yii::$app->db->createCommand($sql)->queryScalar();
        if ($result == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function saveUserAfterRegister()
    {
        $sql = "INSERT INTO user (id, name, email, password) VALUES (null, '{$this->name}', '{$this->email}', '{$this->password}')";
        return Yii::$app->db->createCommand($sql)->execute();
    }
    
    public function checkUserData()
    {
        $sql = "SELECT * FROM user WHERE email = '{$this->email}' AND password = '{$this->password}'";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['id'];   
    }
    
    public function edit($id)
    {
        $id = intval($id);
        if ($id) {
            $sql = "UPDATE user SET name = '{$this->name}', password = '{$this->password}' WHERE id = :id";
            return Yii::$app->db->createCommand($sql)->bindParam('id', $id)->execute();
        }
    }
}