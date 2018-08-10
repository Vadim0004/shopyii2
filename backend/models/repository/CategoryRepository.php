<?php

namespace backend\models\repository;

use common\models\activerecord\Category;

class CategoryRepository
{
    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getCategoryList()
    {
        $category = Category::find()->asArray()->all();
        return $category;
    }
}