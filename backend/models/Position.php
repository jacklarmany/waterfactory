<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id ລະຫັດ
 * @property string $positionname ຊື່ຕຳແໜ່ງ
 * @property float $salary ເງິນເດືອນ
 * @property int $factoryid ລະຫັດໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
 *
 * @property Factory $factory
 * @property PositionTranslate[] $positionTranslates
 * @property Stuff[] $stuffs
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['positionname', 'salary', 'factoryid', 'userid'], 'required'],
            [['salary'], 'number'],
            [['factoryid', 'userid'], 'integer'],
            [['positionname'], 'string', 'max' => 255],
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
            'positionname' => Yii::t('app', 'Positionname'),
            'salary' => Yii::t('app', 'Salary'),
            'factoryid' => Yii::t('app', 'Factoryid'),
            'userid' => Yii::t('app', 'Userid'),
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

    /**
     * Gets query for [[PositionTranslates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPositionTranslates()
    {
        return $this->hasMany(PositionTranslate::className(), ['positionid' => 'id']);
    }

    /**
     * Gets query for [[Stuffs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStuffs()
    {
        return $this->hasMany(Stuff::className(), ['position_id' => 'id']);
    }
}
