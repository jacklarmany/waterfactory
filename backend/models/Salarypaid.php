<?php

namespace backend\models;

use Yii;
use \backend\models\base\Salarypaid as BaseSalarypaid;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "salarypaid".
 */
class Salarypaid extends BaseSalarypaid
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
