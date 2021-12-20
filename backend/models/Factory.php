<?php

namespace backend\models;

use Yii;
use \backend\models\base\Factory as BaseFactory;
use omgdef\multilingual\MultilingualBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "factory".
 */
class Factory extends BaseFactory
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
                'langForeignKey' => 'factoryid',
                'tableName' => "{{%factory_translate}}",
                'attributes' => [
                    'factoryname',
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
