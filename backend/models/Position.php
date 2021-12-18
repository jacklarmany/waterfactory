<?php

namespace backend\models;

use Yii;
use \backend\models\base\Position as BasePosition;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "position".
 */
class Position extends BasePosition
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
