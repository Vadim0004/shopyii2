<?php

namespace frontend\widgets\categoryList;

use frontend\models\Category;
use yii\base\Widget;

class CategoryList extends Widget
{
    public function run()
    {
        $categories = [];
        $categories = Category::getCategoriesList();
        
        return $this->render('category', [
            'categories' => $categories, 
        ]);
    }   
}