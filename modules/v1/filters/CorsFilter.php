<?php

namespace app\modules\v1\filters;

use Yii;
use yii\filters\Cors;

class CorsFilter extends Cors
{
    public function beforeAction($action)
    {
        parent::beforeAction($action);

        if (Yii::$app->getRequest()->getMethod() === 'OPTIONS') {
            Yii::$app->getResponse()->getHeaders()->set('Allow', 'POST GET PUT DELETE');
            Yii::$app->end();
        }

        return true;
    }
}