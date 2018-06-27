<?php

namespace frontend\models\example;

use Yii;

/**
 * This is the model class for table "publisher".
 *
 * @property int $id
 * @property string $name
 * @property string $date_registered
 * @property int $identity_number
 */
class Publisher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{publisher}}';
    }
    
}
