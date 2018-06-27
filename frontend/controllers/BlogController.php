<?php

namespace frontend\controllers;

use frontend\models\Blog;
use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex()
    {
        
        $blogList = [];
        $blogList = Blog::getBlogList(4);

        return $this->render('index', [
            'blogList' => $blogList,
        ]);
    }
    
    public function actionView($id)
    {
        $id = intval($id);
        
        if ($id) {
            $oneNewsList = Blog::getBlogItemById($id);
        }
        
        return $this->render('view', [
            'oneNewsList' => $oneNewsList,
        ]);
    }
    
}