<?php

namespace backend\models;

use yii\base\Model;
use common\models\Meta;

class MetaForm extends Model
{
    public $title;
    public $description;
    public $keywords;

    private $_meta;

    public function __construct(Meta $meta = null, $config = [])
    {
        if ($meta) {
            $this->title = $meta->title;
            $this->description = $meta->description;
            $this->keywords = $meta->keywords;
            $this->_meta = $meta;
        }
        parent::__construct($config);
    }
    public function rules(): array
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['description', 'keywords'], 'string'],
        ];
    }
}