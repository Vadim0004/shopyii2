<?php

namespace common\models\activerecord;

use backend\models\behaviors\MetaBehavior;
use common\models\Meta;

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

    public static function edit(Brand $brand, $name, $slug, Meta $meta)
    {
        $brand->name = $name;
        $brand->slug = $slug;
        $brand->meta = $meta;
        return $brand;
    }

    public function behaviors()
    {
        return [
            [
                'class' => MetaBehavior::class,
                'attribute' => 'meta',
                'jsonAttribute' => 'meta_json',
            ],
        ];
    }
}
