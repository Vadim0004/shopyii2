<?php

namespace frontend\widgets\categoryList;

use frontend\models\activerecord\Category;
use yii\base\Widget;

class CategoryList extends Widget
{
    public function run()
    {
        /*
        $categories = [];
        $categories = Category::getCategoriesList();
         * 
         */
        $categories = Category::find()->orderBy(['sort_order' => SORT_ASC])->all();
        
        return $this->render('category', [
            'categories' => $categories, 
        ]);
    }   
}