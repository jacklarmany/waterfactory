<?php

namespace backend\models;

use Yii;
use \backend\models\base\Unit as BaseUnit;
use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "unit".
 */
class Unit extends BaseUnit
{

    public function behaviors()
    {
        return [
            'ml' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'lo' => 'lao',
                    'en' => 'English',
                ],
                'defaultLanguage' => 'lo',
                'langForeignKey' => 'unit_id',
                'tableName' => "{{%unit_translate}}",
                'attributes' => [
                    'unitname',
                ]
            ],
        ];
    }

    public static function find()
    {
        return new MultilingualQuery(get_called_class());
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
