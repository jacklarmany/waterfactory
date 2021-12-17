<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "factory".
 *
 * @property int $id ລະຫັດໂຮງງານ
 * @property string|null $logo ໂລໂກ້ໂຮງງານ
 * @property string $factoryname ຊື່ໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
 *
 * @property Customer[] $customers
 * @property FactoryTranslate[] $factoryTranslates
 * @property Position[] $positions
 * @property Stuff[] $stuffs
 * @property User $user
 * @property Water[] $waters
 */
class Factory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['factoryname', 'userid'], 'required'],
            [['userid'], 'integer'],
            [['logo'], 'string', 'max' => 255],
            [['factoryname'], 'string', 'max' => 200],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'logo' => Yii::t('app', 'Logo'),
            'factoryname' => Yii::t('app', 'Factoryname'),
            'userid' => Yii::t('app', 'Userid'),
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['factoryid' => 'id']);
    }

    /**
     * Gets query for [[FactoryTranslates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactoryTranslates()
    {
        return $this->hasMany(FactoryTranslate::className(), ['factoryid' => 'id']);
    }

    /**
     * Gets query for [[Positions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['factoryid' => 'id']);
    }

    /**
     * Gets query for [[Stuffs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStuffs()
    {
        return $this->hasMany(Stuff::className(), ['factory_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    /**
     * Gets query for [[Waters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWaters()
    {
        return $this->hasMany(Water::className(), ['factoryid' => 'id']);
    }
}
