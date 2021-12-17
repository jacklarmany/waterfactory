<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salarypaid".
 *
 * @property int $id ລະຫັດ
 * @property string $date ວັນທີ
 * @property string $time ເວລາ
 * @property string $salaryamount ຈຳນວນເງິນເດືອນ
 * @property int $stuffid ລະຫັດພະນັກງານ
 * @property int $factoryid ລະຫັດໂຮງງານ
 *
 * @property Stuff $stuff
 */
class Salarypaid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salarypaid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'date', 'time', 'salaryamount', 'stuffid', 'factoryid'], 'required'],
            [['id', 'stuffid', 'factoryid'], 'integer'],
            [['date', 'time'], 'safe'],
            [['salaryamount'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['stuffid'], 'exist', 'skipOnError' => true, 'targetClass' => Stuff::className(), 'targetAttribute' => ['stuffid' => 'id']],
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
            'salaryamount' => Yii::t('app', 'Salaryamount'),
            'stuffid' => Yii::t('app', 'Stuffid'),
            'factoryid' => Yii::t('app', 'Factoryid'),
        ];
    }

    /**
     * Gets query for [[Stuff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStuff()
    {
        return $this->hasOne(Stuff::className(), ['id' => 'stuffid']);
    }
}
