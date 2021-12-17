<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "factory_translate".
 *
 * @property int $id
 * @property string|null $language
 * @property string|null $factoryname
 * @property int|null $factoryid
 *
 * @property Factory $factory
 */
class FactoryTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factory_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['factoryid'], 'integer'],
            [['language', 'factoryname'], 'string', 'max' => 45],
            [['factoryid'], 'exist', 'skipOnError' => true, 'targetClass' => Factory::className(), 'targetAttribute' => ['factoryid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language' => Yii::t('app', 'Language'),
            'factoryname' => Yii::t('app', 'Factoryname'),
            'factoryid' => Yii::t('app', 'Factoryid'),
        ];
    }

    /**
     * Gets query for [[Factory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(Factory::className(), ['id' => 'factoryid']);
    }
}
