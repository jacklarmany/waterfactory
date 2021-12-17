<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "water_translate".
 *
 * @property int $id
 * @property int|null $language
 * @property string|null $watername
 * @property int|null $waterid
 *
 * @property Water $water
 */
class WaterTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'water_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language', 'waterid'], 'integer'],
            [['watername'], 'string', 'max' => 100],
            [['waterid'], 'exist', 'skipOnError' => true, 'targetClass' => Water::className(), 'targetAttribute' => ['waterid' => 'id']],
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
            'watername' => Yii::t('app', 'Watername'),
            'waterid' => Yii::t('app', 'Waterid'),
        ];
    }

    /**
     * Gets query for [[Water]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWater()
    {
        return $this->hasOne(Water::className(), ['id' => 'waterid']);
    }
}
