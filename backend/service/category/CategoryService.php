<?php

namespace backend\service\category;

use backend\models\repository\CategoryRepository;
use backend\models\Category as CategoryModel;
use common\models\activerecord\Category;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategorys()
    {
        $category = $this->categoryRepository->getCategoryList();
        return $category;
    }

    public function saveCategory(CategoryModel $modelCategory): Category
    {
        $category = Category::saveCategory($modelCategory);
        $this->categoryRepository->save($category);
        return $category;
    }

    public function deleteCategory(int $id)
    {
        $id = intval($id);
        if ($id) {
            $category = $this->categoryRepository->getCategoryById($id);
            $delete = $this->categoryRepository->delete($category);
            return $delete;
        } else {
            throw new \RuntimeException('Please. add integer!!!!!');
        }
    }

    public function getCategoryById(int $id): Category
    {
        $id = intval($id);
        if ($id) {
            $category = $this->categoryRepository->getCategoryById($id);
            return $category;
        } else {
            throw new \RuntimeException('Please. add integer!!!!!');
        }

    }

    public function editCategory(Category $category, CategoryModel $modelCategory): Category
    {
        $categorySave = Category::editCategory($category, $modelCategory);
        $this->categoryRepository->save($categorySave);
        return $categorySave;
    }
}