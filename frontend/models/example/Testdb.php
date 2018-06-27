<?php

namespace frontend\models\example;

use yii\db\ActiveRecord;

class Testdb extends ActiveRecord
{
    public static function tablename()
    {
        return '{{test_db_work_bench}}';
    }
    
}