<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\filters\CorsFilter;
use app\modules\v1\models\Book;

class BooksController extends ActiveController
{
    public $modelClass = Book::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['cors'] = [
            'class' => CorsFilter::class,
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        return Book::find()->with('author')->orderBy(['title' => SORT_DESC])->asArray()->all();
    }

    public function actionList()
    {
        $list = array();
        $models = Book::find()->with('author')->orderBy(['title' => SORT_DESC])->all();
        foreach ($models as $book) {
            array_push($list, array(
                'id' => $book->id,
                'title' => $book->title,
                'isbn' => $book->isbn,
                'author' => $book->author->firstname .' '. $book->author->lastname
            ));
        }
        return $list;
    }
}
