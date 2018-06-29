<?php

namespace frontend\widgets\categoryList;

use frontend\models\repository\Categoryrepository;
use yii\base\Widget;

class CategoryList extends Widget
{
    public function run()
    {
        $categoryRepository = new Categoryrepository();
        $categories = $categoryRepository->getCategoryList();
        
        return $this->render('category', [
            'categories' => $categories, 
        ]);
    }   
}