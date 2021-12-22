<?php

namespace backend\models;

use Yii;
use \backend\models\base\Water as BaseWater;
use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "water".
 */
class Water extends BaseWater
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
                'langForeignKey' => 'waterid',
                'tableName' => "{{%water_translate}}",
                'attributes' => [
                    'watername',
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
