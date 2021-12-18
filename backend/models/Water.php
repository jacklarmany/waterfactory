<?php

namespace backend\models;

use Yii;
use \backend\models\base\Water as BaseWater;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "water".
 */
class Water extends BaseWater
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
