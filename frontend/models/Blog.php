<?php

namespace frontend\models;

use Yii;

class Blog
{
    const SHOW_BY_DEFAULT = 3;
    /**
     * Возвращает массив с 1 новости из БД
     * @param integer $id <p>Id новости из БД</p>
     */
    public static function getBlogItemById($id)
    {
        $id = intval($id);

        if ($id) {
                        
            $sql = 'SELECT * FROM blog WHERE id = :id';
            $blogItem = Yii::$app->db->createCommand($sql)->bindParam('id', $id)->queryOne();
            return $blogItem;
        }
    }

    /**
     * Возвращает массив новостей из БД
     * @param type $numberItems <p>Количество новостей выводить на странице</p>
     * @return array
     */
    public static function getBlogList($numberItems = self::SHOW_BY_DEFAULT) {
        
        $sql = 'SELECT id, title, date, short_content FROM blog ORDER BY date DESC LIMIT ' . $numberItems;       
        $blogList = Yii::$app->db->createCommand($sql)->queryAll();
        return $blogList;
    }


}
