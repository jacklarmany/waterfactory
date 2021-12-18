<?php

namespace backend\models;

use Yii;
use \backend\models\base\Prepareforsellview as BasePrepareforsellview;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prepareforsellview".
 */
class Prepareforsellview extends BasePrepareforsellview
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
