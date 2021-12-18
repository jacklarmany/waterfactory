<?php

namespace backend\models;

use Yii;
use \backend\models\base\Stuff as BaseStuff;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "stuff".
 */
class Stuff extends BaseStuff
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
