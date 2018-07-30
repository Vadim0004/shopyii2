<?php

namespace common\models\activerecord;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $short_content
 * @property string $content
 */
class Blog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'short_content'], 'required'],
            [['date'], 'safe'],
            [['short_content', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'date' => 'Date',
            'short_content' => 'Short Content',
            'content' => 'Content',
        ];
    }
}
