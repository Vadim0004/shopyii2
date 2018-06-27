<?php

namespace frontend\controllers;

use Yii;
use frontend\models\example\Book;
use frontend\models\Bookmodel;

class BookshopController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $book = new Bookmodel();
        if ($book->load(Yii::$app->request->post()) && $book->validate()) {
            $bookActive = new Book();
            $bookActive->name = $book['name'];
            $bookActive->isbn = $book['isbn'];
            $bookActive->date_published = $book['date_published'];
            $bookActive->save();
            Yii::$app->session->setFlash('success', 'Сохранено');
            return $this->redirect(['bookshop/index']);
        }
        
        return $this->render('index', [
            'book' => $book
        ]);
    }
    
    public function actionView()
    {
        $book = Book::find()->limit(10)->orderBy(['id' => SORT_ASC])->all();
        return $this->render('view', [
            'book' => $book
        ]);
    }
}