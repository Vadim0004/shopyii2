<?php

namespace common\models\activerecord;

use common\models\Meta;
use yii\helpers\Json;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $meta_json
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{brand}}';
    }

    public static function create($name, $slug, Meta $meta): self
    {
        $brand = new Static();
        $brand->name = $name;
        $brand->slug = $slug;
        $brand->meta_json = $meta;
        return $brand;
    }

    public function edit($name, $slug, Meta $meta): void
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->meta_json = $meta;
    }

    public function afterFind(): void
    {
        $meta = Json::decode($this->getAttribute('meta_json'));
        $this->meta_json = new Meta($meta['title'], $meta['description'], $meta['keywords']);
        parent::afterFind();
    }

    public function beforeSave($insert): void
    {
        $this->attributes('meta_json', Json::encode([
            'title' => $this->meta_json->title,
            'description' => $this->meta_json->description,
            'keywords' => $this->meta_json->keywords,
        ]));
        parent::beforeSave($insert);
    }
}
