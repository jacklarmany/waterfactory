<?php

namespace backend\models;

use Yii;
use \backend\models\base\Position as BasePosition;
use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "position".
 */
class Position extends BasePosition
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
                'langForeignKey' => 'positionid',
                'tableName' => "{{%position_translate}}",
                'attributes' => [
                    'positionname',
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
