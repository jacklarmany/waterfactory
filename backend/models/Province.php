<?php

namespace backend\models;

use Yii;
use \backend\models\base\Province as BaseProvince;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "province".
 */
class Province extends BaseProvince
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
