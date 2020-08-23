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
}
