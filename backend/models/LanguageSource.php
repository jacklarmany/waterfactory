<?php

namespace backend\models;

use Yii;
use \backend\models\base\LanguageSource as BaseLanguageSource;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "language_source".
 */
class LanguageSource extends BaseLanguageSource
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
