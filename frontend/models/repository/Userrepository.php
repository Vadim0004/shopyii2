<?php

namespace frontend\models\repository;

use common\models\activerecord\User;

class Userrepository
{
    
    /**
     * 
     * @param string $email
     * @return array ActiveQuery
     */
    public function checkExistEmailInDb(string $email)
    {
        $emailUser = User::find()
                ->where(['email' => $email])
                ->count();
        
        return $emailUser;
    }
    
    /**
     * 
     * @param string $email
     * @param string $password
     * @return true|false ActiveQuery
     */
    public function checkUserData(string $email, string $password)
    {
        $checkUser = User::find()
                ->where(['email' => $email])
                ->andWhere(['password' => $password])
                ->one();
        
        return $checkUser['id'];
    }
    
    /**
     * 
     * @param int $id
     * @return array ActiveQuery
     */
    public function getUserById(int $id)
    {
        $user = User::find()
                ->where(['id' => $id])
                ->one();
        
        return $user;
    }
    
}