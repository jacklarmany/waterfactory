<?php

namespace backend\models;

use Yii;
use \backend\models\base\UnitTranslate as BaseUnitTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "unit_translate".
 */
class UnitTranslate extends BaseUnitTranslate
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
