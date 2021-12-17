<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wateradd".
 *
 * @property int $id ລະຫັດ
 * @property string $date ວັນທີ
 * @property string $time ເວລາ
 * @property int $waterid ລະຫັດນໍ້າດື່ມ
 * @property int $quantity ຈຳນວນ
 * @property string $unit ຫົວໜ່ວຍ
 * @property int $factoryid ລະຫັດໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
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
            [['date', 'time', 'waterid', 'quantity', 'unit', 'factoryid', 'userid'], 'required'],
            [['date', 'time'], 'safe'],
            [['waterid', 'quantity', 'factoryid', 'userid'], 'integer'],
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
            'time' => Yii::t('app', 'Time'),
            'waterid' => Yii::t('app', 'Waterid'),
            'quantity' => Yii::t('app', 'Quantity'),
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
