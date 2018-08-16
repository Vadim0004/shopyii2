<?php

namespace common\models\activerecord;

use yii\db\ActiveRecord;
use backend\models\Category as CategoryModel;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int $sort_order
 * @property int $status
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{category}}';
    }


    /**
     * @param CategoryModel $modelCategory
     * @return Category
     */
    public static function saveCategory(CategoryModel $modelCategory): self
    {
        $category = new Static();
        $category->name = $modelCategory->name;
        $category->sort_order = $modelCategory->sort_order;
        $category->status = $modelCategory->status;

        return $category;
    }

    /**
     * @param Category $category
     * @param CategoryModel $modelCategory
     * @return Category
     */
    public static function editCategory(Category $category, CategoryModel $modelCategory): self
    {
        $category->name = $modelCategory->name;
        $category->sort_order = $modelCategory->sort_order;
        $category->status = $modelCategory->status;

        return $category;
    }
}
