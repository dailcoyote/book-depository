<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Book;
use yii\rest\ActiveController;

class BooksController extends ActiveController
{
    public $modelClass = Book::class;

    // protected function verbs()
    // {
    //     $verbs = parent::verbs();
    //     $verbs =  [
    //         'index' => ['GET', 'POST', 'HEAD'],
    //         'view' => ['GET', 'HEAD'],
    //         'create' => ['POST'],
    //         'update' => ['PUT', 'POST', 'PATCH'],
    //         'delete' => ['DELETE'],
    //     ];
    //     return $verbs;
    // }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['view']);
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        return Book::find()->with('author')->asArray()->all();
    }

    public function actionList()
    {
        $list = array();
        $models = Book::find()->with('author')->all();
        foreach ($models as $book) {
            array_push($list, array(
                'author' => $book->author->firstname .' '. $book->author->lastname,
                'title' => $book->title,
                'isbn' => $book->isbn,
                'id' => $book->id
            ));
        }
        return $list;
    }

    public function actionView($id)
    {
        $book = Book::findOne($id);
        $author = $book->author;
        return array(
            'author' => $author->firstname .' '. $author->lastname,
            'title' => $book->title,
            'isbn' => $book->isbn,
            'id' => $book->id
        );
    }
}
