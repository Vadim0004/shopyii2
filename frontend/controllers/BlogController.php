<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\repository\Blogrepository;

class BlogController extends Controller
{   
    public function actionIndex()
    {
        $blogRepository = new Blogrepository();
        $blogList = $blogRepository->getBlogList(Yii::$app->params['showByDefailtNews']);

        return $this->render('index', [
            'blogList' => $blogList,
        ]);
    }
    
    public function actionView($id)
    {
        $blogRepository = new Blogrepository();
        $oneNewsList = $blogRepository->getOneItemBlog($id);
        
        return $this->render('view', [
            'oneNewsList' => $oneNewsList,
        ]);
    }
    
}