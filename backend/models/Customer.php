<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $dob
 * @property string $gender
 * @property string $cardid
 * @property string $tel
 * @property string $village
 * @property string $district
 * @property string $province
 * @property int|null $factoryid
 * @property int|null $userid
 *
 * @property Factory $factory
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'dob', 'gender', 'cardid', 'tel', 'village', 'district', 'province'], 'required'],
            [['dob'], 'safe'],
            [['factoryid', 'userid'], 'integer'],
            [['fname', 'lname'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 7],
            [['cardid'], 'string', 'max' => 16],
            [['tel'], 'string', 'max' => 14],
            [['village', 'district', 'province'], 'string', 'max' => 150],
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
            'fname' => Yii::t('app', 'Fname'),
            'lname' => Yii::t('app', 'Lname'),
            'dob' => Yii::t('app', 'Dob'),
            'gender' => Yii::t('app', 'Gender'),
            'cardid' => Yii::t('app', 'Cardid'),
            'tel' => Yii::t('app', 'Tel'),
            'village' => Yii::t('app', 'Village'),
            'district' => Yii::t('app', 'District'),
            'province' => Yii::t('app', 'Province'),
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
}
