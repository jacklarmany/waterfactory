<?php

namespace backend\models;

use Yii;
use \backend\models\base\LanguageTranslate as BaseLanguageTranslate;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "language_translate".
 */
class LanguageTranslate extends BaseLanguageTranslate
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
