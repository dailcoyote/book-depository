<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\filters\CorsFilter;
use app\modules\v1\models\Author;

class AuthorsController extends ActiveController
{
    public $modelClass = Author::class;

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
        $list = array();
        $models = Author::find()
            ->orderBy(['firstname' => SORT_ASC, 'lastname' => SORT_ASC])
            ->with('books')
            ->all();
        foreach ($models as $author) {
            array_push($list, array(
                'id' => $author->id,
                'firstname' => $author->firstname,
                'lastname' => $author->lastname,
                'occupation' => $author->occupation,
                'books_count' => intval($author->getBooks()->count())
            ));
        }
        return $list;
    }

    public function actionShortList()
    {
        $list = array();
        $models = Author::find()
            ->orderBy(['firstname' => SORT_ASC, 'lastname' => SORT_ASC])
            ->select(['id', 'firstname', 'lastname'])
            ->all();
        foreach ($models as $author) {
            array_push($list, array(
                'id' => $author->id,
                'fullname' => $author->firstname . ' ' . $author->lastname
            ));
        }
        return $list;
    }
}
