<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Book;
use yii\rest\ActiveController;

class BooksController extends ActiveController
{
    public $modelClass = Book::class;

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'POST', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'POST', 'PATCH'],
            'delete' => ['DELETE'],
        ];
        return $verbs;
    }
    
    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        return Book::find()->with('author')->asArray()->all();
    }

    public function actionList(){
        return Book::find()->with('author')->asArray()->all();
    }
}