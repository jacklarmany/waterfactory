<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wateradd".
 *
 * @property int $id
 * @property string $date
 * @property int $waterid
 * @property int $quality
 * @property string $unit
 * @property int $factoryid
 * @property int|null $userid
 *
 * @property Water $water
 */
class Wateradd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wateradd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'waterid', 'quality', 'unit', 'factoryid'], 'required'],
            [['date'], 'safe'],
            [['waterid', 'quality', 'factoryid', 'userid'], 'integer'],
            [['unit'], 'string', 'max' => 10],
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
            'date' => Yii::t('app', 'Date'),
            'waterid' => Yii::t('app', 'Waterid'),
            'quality' => Yii::t('app', 'Quality'),
            'unit' => Yii::t('app', 'Unit'),
            'factoryid' => Yii::t('app', 'Factoryid'),
            'userid' => Yii::t('app', 'Userid'),
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
