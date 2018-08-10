<?php

namespace backend\models;

use yii\base\Model;
use Yii;

class UploadForm extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        $alias = $_SERVER['DOCUMENT_ROOT'] . Yii::getAlias('@images');
        if ($this->validate()) {
            $this->image->saveAs("$alias/" . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}