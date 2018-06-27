<?php

namespace frontend\models\example;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_published
 * @property integer $publisher_id
 */

class Book extends ActiveRecord
{
    public static function tablename()
    {
        return '{{book}}';
    }
    
    public function getDatePublish()
    {
        return ($this->date_published) ? Yii::$app->formatter->asDate($this->date_published) : 'Не задана';
    }
    
    public function getPublisher()
    {
        return $this->hasOne(Publisher::className(), ['id' => 'publisher_id'])->one();
    }

    public function getPublisherName()
    {
        $publisher = $this->getPublisher();
        if ($publisher) {
            return $publisher->name;
        } else {
            return 'Издатель не указан';
        }
    }
    /**
     * @return ActiveQuery
     */
    public function getBookToAuthorRelations()
    {
        return $this->hasMany(BookToAuthor::className(), ['book_id' => 'id']);
    }
    /**
     * @return Author[]
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->via('bookToAuthorRelations')->all();
    }
    /**
     * @return string Author first_name and last_name
     */
    public function getFullName()
    {
        $author = $this->getAuthors();
        foreach ($author as $authorItem) {
            return $authorItem->first_name . ' ' . $authorItem->last_name . ' ';
        }
    }
}