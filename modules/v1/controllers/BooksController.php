<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Book;
use yii\rest\ActiveController;

class BooksController extends ActiveController
{
    public $modelClass = Book::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['cors'] = [
            'class' => Cors::class
        ];
        return $behaviors;
    }

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
