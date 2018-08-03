<?php

namespace frontend\widgets\categoryList;

use frontend\models\repository\CategoryRepository;
use yii\base\Widget;

class CategoryList extends Widget
{
    public function run()
    {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getCategoryList();
        
        return $this->render('category', [
            'categories' => $categories, 
        ]);
    }   
}