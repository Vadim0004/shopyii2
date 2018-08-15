<?php

namespace backend\models\repository;

use common\models\activerecord\User;

class UserRepository
{

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllOrdersByUser()
    {
        $orders = User::find()
            ->alias('o')
            ->select(['o.id', 'o.name', 'o.email'])
            ->innerJoinWith(['productOrdersById p' => function ($query) {
                $query->select(['p.id', 'p.user_id', 'p.products', 'p.user_name', 'p.user_phone', 'p.user_comment', 'p.date', 'p.status', 'p.value'])
                    ->OrderBy(['id' => SORT_ASC]);
            }]);

        return $orders->all();
    }

}