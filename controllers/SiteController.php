<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays api message .
     *
     * @return string
     */
    public function actionIndex()
    {
        echo 'Book depository api';
    }
}
