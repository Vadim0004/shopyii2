<?php

namespace backend\models;

use yii\base\Model;
use common\models\activerecord\Brand;
use yii\helpers\ArrayHelper;

class BrandForm extends Model
{
    public $name;
    public $slug;

    public $_meta;
    private $_brand;

    public function __construct(Brand $brand = null, $config = [])
    {
        if ($brand) {
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->_meta = new MetaForm($brand->meta);
            $this->_brand = $brand;
        } else {
            $this->_meta = new MetaForm();
        }
        parent::__construct($config);
    }

    public function load($data, $formName = null)
    {
        $self = parent::load($data, $formName);
        $meta = $this->_meta->load($data, $formName === '' ? 'meta' : null);
        return $self && $meta;
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        $self = parent::validate(array_filter($attributeNames, 'is_string'), $clearErrors);
        $meta = $this->_meta->validate(ArrayHelper::getValue($attributeNames, 'meta'), $clearErrors);
        return $self && $meta;
    }

    public function rules(): array
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name', 'slug'], 'unique', 'targetClass' => Brand::class, 'filter' => $this->_brand ? ['<>', 'id', $this->_brand->id] : null]
        ];
    }

}