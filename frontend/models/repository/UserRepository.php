<?php

namespace frontend\models\repository;

use common\models\activerecord\User;
use frontend\models\UserRegister;

class UserRepository
{
    /**
     * @param UserRegister $form
     * @return array|null|\yii\db\ActiveRecord
     */
    public function checkUserData(UserRegister $form)
    {
        $user = User::find()
            ->where(['email' => $form->email])
            ->andWhere(['password' => $form->password])
            ->one();

        return $user;
    }

    /**
     * @param int $id
     * @return array|null|\yii\db\ActiveRecord
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
        } else {
            return true;
        }
    }

    public function getOrdersById(int $orderId)
    {
        $result = User::find()
            ->alias('o')
            ->select(['o.id', 'o.name', 'o.email'])
            ->where(['o.id' => $orderId])
            ->innerJoinWith(['productOrdersById p' => function ($query) {
                $query->select(['p.id', 'p.user_id', 'p.products', 'p.user_name', 'p.user_phone', 'p.user_comment', 'p.date', 'p.status', 'p.value'])
                    ->OrderBy(['id' => SORT_DESC]);
            }]);

        return $result->asArray()->all();
    }

}