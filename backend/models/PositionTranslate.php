<?php

namespace backend\models;

use Yii;
use \backend\models\base\PositionTranslate as BasePositionTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "position_translate".
 */
class PositionTranslate extends BasePositionTranslate
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
