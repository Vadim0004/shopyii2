<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file'],
        ];
    }
}