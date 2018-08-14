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
        $category = Category::find()->all();
        return $category;
    }

    /**
     * @param int $id
     * @return array|null|\yii\db\ActiveRecord\
     */
    public function getCategoryById(int $id)
    {
        $category = Category::find()
            ->where(['id' => $id])
            ->one();

        return $category;
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function save(Category $category)
    {
        if ($category->save()) {
            return true;
        } else {
            throw new \RuntimeException('Saving error. category');
        }
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category)
    {
        if ($category->delete()) {
            return true;
        } else {
            throw new \RuntimeException('Delete error. category');
        }
    }
}