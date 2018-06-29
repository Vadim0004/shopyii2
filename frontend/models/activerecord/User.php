<?php

namespace frontend\models\activerecord;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 */
class User extends \yii\db\ActiveRecord
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
     * @param type $name
     * @param type $email
     * @param type $password
     * @return true|false
     */
    public function saveUserAfterRegister(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        
        return $this->save();
    }
    
    public function saveUserAfterEdite(int $id, string $name, string $password)
    {
        $this->findOne($id);
        $this->name = $name;
        $this->password = $password;
        
        return $this->update();
    }
    
}
