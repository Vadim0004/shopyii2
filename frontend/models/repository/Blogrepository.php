<?php

namespace frontend\models\repository;

use common\models\activerecord\Blog;

class Blogrepository
{
    const SHOW_BY_DEFAULT = 2;
    /**
     * 
     * @param int $max
     * @return array ActiveQuery
     */
    public function getBlogList(int $max = self::SHOW_BY_DEFAULT)
    {
        $blogList = Blog::find()
                ->orderBy(['id' => SORT_DESC])
                ->limit($max)
                ->all();
        
        return $blogList;
    }
    
    /**
     * 
     * @param int $id
     * @return array ActiveQuery
     */
    public function getOneItemBlog(int $id)
    {
        $blogItem = Blog::find()
                ->where(['id' => $id])
                ->one();
        
        return $blogItem;
    }
}