<?php

namespace frontend\models\repository;

use common\models\activerecord\Category;

class CategoryRepository
{
    /**
     * 
     * @return array ActiveQuery
     */
    public function getCategoryList()
    {
        $categoryList = Category::find()
                ->orderBy(['sort_order' => SORT_ASC])
                ->all();
        
        return $categoryList;
    }
}