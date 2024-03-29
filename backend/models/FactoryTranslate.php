<?php

namespace backend\models;

use Yii;
use \backend\models\base\FactoryTranslate as BaseFactoryTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "factory_translate".
 */
class FactoryTranslate extends BaseFactoryTranslate
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
