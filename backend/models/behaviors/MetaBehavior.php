<?php

namespace backend\models\behaviors;

use common\models\activerecord\Brand;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\models\Meta;

class MetaBehavior extends Behavior
{
    public $attribute = 'meta';
    public $jsonAttribute = 'meta_json';

    public function events(): array
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'onAfterFind',
            ActiveRecord::EVENT_BEFORE_INSERT => 'onBeforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'onBeforeSave',
        ];
    }

    public function onAfterFind(Event $event): void
    {
        /** @var Brand $brand*/
        $brand = $event->sender;
        $meta = Json::decode($brand->getAttribute($this->jsonAttribute));
        $brand->{$this->attribute} = new Meta($meta['title'], $meta['description'], $meta['keywords']);
    }

    public function onBeforeSave(Event $event): void
    {
        /** @var Brand $brand*/
        $brand = $event->sender;
        $json = Json::encode([
            'title' => $brand->{$this->attribute}->title,
            'description' => $brand->{$this->attribute}->description,
            'keywords' => $brand->{$this->attribute}->keywords,
        ]);
        $brand->__set($this->jsonAttribute, $json);
    }
}