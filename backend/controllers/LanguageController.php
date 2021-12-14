<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class LanguageController extends Controller
{
    public function actionChange($lang)
    {

        if($lang == 'en'){
            $_SESSION['lang'] = $lang;
            Yii::$app->language = $_SESSION['lang'];
            return $this->redirect(Yii::$app->request->referrer);
        }
        elseif($lang == 'lo'){
            $_SESSION['lang'] = $lang;
            Yii::$app->language = $_SESSION['lang'];
            return $this->redirect(Yii::$app->request->referrer);
        }

        // if (!in_array($lang, ['en', 'lo'])) {
        //     Yii::$app->language = $lang;
        // }
        // return $this->redirect(Yii::$app->request->referrer);
    }
}