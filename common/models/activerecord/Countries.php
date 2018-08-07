<?php

namespace common\models\activerecord;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $countries_name
 * @property string $countries_iso_code_2
 * @property string $countries_iso_code_3
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{countries}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countries_name'], 'string', 'max' => 64],
            [['countries_iso_code_2'], 'string', 'max' => 2],
            [['countries_iso_code_3'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countries_name' => 'Countries Name',
            'countries_iso_code_2' => 'Countries Iso Code 2',
            'countries_iso_code_3' => 'Countries Iso Code 3',
        ];
    }
}
