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
    
    /**
     * 
     * @param string $name
     * @param string $email
     * @param string $password
     * @return true|false ActiveQuery
     */
    public function saveUserAfterRegister(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        
        return $this->save();
    }
    
    /**
     * 
     * @param int $id
     * @param string $name
     * @param string $password
     * @return array ActiveQuery
     */
    public function saveUserAfterEdite(int $id, string $name, string $password)
    {
        $this->setOldAttribute('id', $id);
        $this->name = $name;
        $this->password = $password;
        $result = $this->update();
        
        return $result;
    }
    
}
