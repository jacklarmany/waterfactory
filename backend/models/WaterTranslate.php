<?php

namespace backend\models;

use Yii;
use \backend\models\base\WaterTranslate as BaseWaterTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "water_translate".
 */
class WaterTranslate extends BaseWaterTranslate
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
