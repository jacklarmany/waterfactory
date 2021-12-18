<?php

namespace backend\models;

use Yii;
use \backend\models\base\Factory as BaseFactory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "factory".
 */
class Factory extends BaseFactory
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
