<?php

namespace backend\models;

use common\models\activerecord\Product;
use yii\base\Model;
use Yii;

class UploadForm extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

	public function upload(Product $product)
	{
		$pathFile = $_SERVER['DOCUMENT_ROOT'] . Yii::getAlias('@images') . "/$product->id" . '.jpg';
		if ($this->validate() && !file_exists($pathFile)) {
			$path = $_SERVER['DOCUMENT_ROOT'] . Yii::getAlias('@images');
			$this->image->saveAs("$path/{$product->id}.{$this->image->extension}");
			return true;
		}
	}
}