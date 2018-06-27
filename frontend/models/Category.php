<?php

namespace frontend\models;

use Yii;

class Category
{
    public static function getCategoriesList()
    {
        $sql = 'SELECT id, name, status FROM category '
                . 'ORDER BY sort_order ASC';

        $categoryList = Yii::$app->db->createCommand($sql)->queryAll();

        return $categoryList;
    }
}