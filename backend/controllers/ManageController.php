<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Manage controller
 */
class ManageController extends Controller
{
    public function actionMnf($id)
    {
        if(Yii::$app->user->id != null){
            $session = Yii::$app->session;
            $session->open();
            $_SESSION['factoryid'] = $id;
    
            return $this->render('mnf');
        }
        else{
            return $this->goHome();
        }
    } 
}
