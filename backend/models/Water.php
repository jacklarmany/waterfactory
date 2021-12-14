<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "water".
 *
 * @property int $id
 * @property string $image
 * @property string $watername
 * @property string $unit
 * @property int|null $quality
 * @property float $sellprice
 * @property int $factoryid
 * @property int $userid
 *
 * @property Prepareforsell $prepareforsell
 * @property Wateradd[] $wateradds
 */
class Water extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'water';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'watername', 'unit', 'sellprice', 'factoryid', 'userid'], 'required'],
            [['quality', 'factoryid', 'userid'], 'integer'],
            [['sellprice'], 'number'],
            [['image'], 'string', 'max' => 255],
            [['watername'], 'string', 'max' => 100],
            [['unit'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'watername' => Yii::t('app', 'Watername'),
            'unit' => Yii::t('app', 'Unit'),
            'quality' => Yii::t('app', 'Quality'),
            'sellprice' => Yii::t('app', 'Sellprice'),
            'factoryid' => Yii::t('app', 'Factoryid'),
            'userid' => Yii::t('app', 'Userid'),
        ];
    }

    /**
     * Gets query for [[Prepareforsell]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrepareforsell()
    {
        return $this->hasOne(Prepareforsell::className(), ['waterid' => 'id']);
    }

    /**
     * Gets query for [[Wateradds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWateradds()
    {
        return $this->hasMany(Wateradd::className(), ['waterid' => 'id']);
    }
}
