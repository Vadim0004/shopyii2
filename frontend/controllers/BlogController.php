<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\repository\Blogrepository;

class BlogController extends Controller
{
    private $repository;
    
    public function __construct(
            $id, 
            $module, 
            Blogrepository $repository, 
            $config = []) 
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $blogList = $this->repository->getBlogList(Yii::$app->params['showByDefailtNews']);

        return $this->render('index', [
            'blogList' => $blogList,
        ]);
    }
    
    public function actionView($id)
    {
        $oneNewsList = $this->repository->getOneItemBlog($id);
        
        return $this->render('view', [
            'oneNewsList' => $oneNewsList,
        ]);
    }
    
}