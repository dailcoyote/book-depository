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

    public function actionIndex($author_id = null)
    {
        $query = Book::find();
        if($author_id) {
            $query = $query->where(['author_id' => $author_id]);
        }
        return $query->orderBy(['title' => SORT_ASC])->asArray()->all();
    }

    public function actionList($author_id = null)
    {
        $list = array();
        $query = Book::find();
        if($author_id) {
            $query = $query->where(['author_id' => $author_id]);
        }
        $models = $query->with('author')->orderBy(['title' => SORT_ASC])->all();
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
