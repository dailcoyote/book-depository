<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\Controller;

class BooksController extends Controller
{

    public function actionIndex()
    {
       Yii::$app->response->statusCode = 200;
       return [
           'status' => 'ok'
       ];
    }

}