<?php

namespace common\models\activerecord;

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

    public function saveUserAfterRegister(string $name, string $email, string $password)
    {
    	$user = new Static();
	    $user->name = $name;
	    $user->email = $email;
	    $user->password = $password;
        
        return $user;
    }

    public function saveUserAfterEdite(int $id, string $name, string $password)
    {
        $this->setOldAttribute('id', $id);
        $this->name = $name;
        $this->password = $password;
        $result = $this->update();

        return $result;
    }
    
}
