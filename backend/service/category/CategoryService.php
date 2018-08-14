<?php

namespace backend\service\category;

use backend\models\repository\CategoryRepository;
use backend\models\Category as CategoryModel;
use common\models\activerecord\Category;

class CategoryService
{
    private $categoryRepository;
    private $categoryActive;

    public function __construct(CategoryRepository $categoryRepository, Category $categoryActive)
    {
        $this->categoryActive = $categoryActive;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategorys()
    {
        $category = $this->categoryRepository->getCategoryList();
        return $category;
    }

    public function saveCategory(CategoryModel $modelCategory)
    {
        $category = $this->categoryActive->saveCategory($modelCategory);
        $categorySave = $this->categoryRepository->save($category);
        return $categorySave;
    }

    public function deleteCategory(int $id)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        $delete = $this->categoryRepository->delete($category);
        return $delete;
    }
}