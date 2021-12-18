<?php

namespace backend\models;

use Yii;
use \backend\models\base\Watersale as BaseWatersale;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "watersale".
 */
class Watersale extends BaseWatersale
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
