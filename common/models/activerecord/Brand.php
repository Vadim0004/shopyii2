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
 * @property Meta $meta
 */
class Brand extends \yii\db\ActiveRecord
{
    public $meta;

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
        $brand->meta = $meta;
        return $brand;
    }

    public function edit($name, $slug, Meta $meta): void
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->meta = $meta;
    }

    public function afterFind(): void
    {
        $meta = Json::decode($this->getAttribute('meta_json'));
        $this->meta = new Meta($meta['title'], $meta['description'], $meta['keywords']);
        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $json = Json::encode([
            'title' => $this->meta->title,
            'description' => $this->meta->description,
            'keywords' => $this->meta->keywords,
        ]);

        $this->__set('meta_json', $json);
        return true;
    }
}
