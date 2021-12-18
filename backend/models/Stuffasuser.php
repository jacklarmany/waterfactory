<?php

namespace backend\models;

use Yii;
use \backend\models\base\Stuffasuser as BaseStuffasuser;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "stuffasuser".
 */
class Stuffasuser extends BaseStuffasuser
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
