<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prepareforsell".
 *
 * @property int $id
 * @property int $waterid
 * @property int $quality
 * @property float $sellprice
 * @property float|null $discount
 * @property int|null $customerid
 * @property int $factoryid
 * @property int $userid
 *
 * @property Water $water
 */
class Prepareforsell extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prepareforsell';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['waterid', 'quality', 'sellprice', 'factoryid', 'userid'], 'required'],
            [['waterid', 'quality', 'customerid', 'factoryid', 'userid'], 'integer'],
            [['sellprice', 'discount'], 'number'],
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
            'waterid' => Yii::t('app', 'Waterid'),
            'quality' => Yii::t('app', 'Quality'),
            'sellprice' => Yii::t('app', 'Sellprice'),
            'discount' => Yii::t('app', 'Discount'),
            'customerid' => Yii::t('app', 'Customerid'),
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
