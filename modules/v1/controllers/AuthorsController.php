<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Author;
use yii\rest\ActiveController;

class AuthorsController extends ActiveController
{
    public $modelClass = Author::class;

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'POST', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
        return $verbs;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $list = array();
        $models = Author::find()->with('books')->all();
        foreach ($models as $author) {
            array_push($list, array(
                'firstname' => $author->firstname,
                'lastname' => $author->lastname,
                'occupation' => $author->occupation,
                'books_count' => intval($author->getBooks()->count()),
                'id' => $author->id
            ));
        }
        return $list;
    }

}
