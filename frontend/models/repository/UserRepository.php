<?php

namespace frontend\models\repository;

use common\models\activerecord\User;

class UserRepository
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

    public function save(User $user)
    {
		if (!$user->save()) {
			throw new \RuntimeException('Saving error.');
		}
    }

    public function getOrdersById(int $orderId)
    {
    	$result = User::find()
		    ->alias('o')
		    ->select(['o.id', 'o.name', 'o.email'])
		    ->where(['o.id' => $orderId])
		    ->innerJoinWith(['productOrdersById p' => function ($query) {
			    $query->select(['p.id', 'p.user_id', 'p.products', 'p.user_name', 'p.user_phone', 'p.user_comment', 'p.date',  'p.status', 'p.value'])
			    ->OrderBy(['id' => SORT_DESC]);
		    }]);

    	return $result->asArray()->all();
    }

}