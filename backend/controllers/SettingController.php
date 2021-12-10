<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Manage controller
 */
class SettingController extends Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->id != null && isset( $_SESSION['factoryid'])){

            return $this->render('index');
        }
        else{
            return $this->goHome();
        }
    }
}
