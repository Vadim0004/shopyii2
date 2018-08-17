<?php

namespace common\models\activerecord;

use frontend\models\UserRegister;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 */
class User extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{user}}';
    }

    public function getProductOrdersById()
    {
        return $this->hasMany(ProductOrder::class, ['user_id' => 'id']);
    }

    public function getAddressBookById()
    {
        return $this->hasOne(AddressBook::class, ['customer_id' => 'id']);
    }

    /**
     * @param UserRegister $userRegister
     * @return User
     */
    public static function saveUserAfterRegister(UserRegister $userRegister): self
    {
        $user = new Static();
        $user->name = $userRegister->name;
        $user->email = $userRegister->email;
        $user->password = $userRegister->password;

        return $user;
    }

    public function saveUserAfterEdite(User $user, UserRegister $userRep)
    {
        $user->name = $userRep->name;
        $user->password = $userRep->password;

        return $user;
    }

}
