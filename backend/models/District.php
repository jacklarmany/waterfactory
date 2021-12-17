<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string|null $districtname
 * @property int|null $province_id
 *
 * @property Province $province
 * @property Village[] $villages
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id'], 'integer'],
            [['districtname'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'districtname' => Yii::t('app', 'Districtname'),
            'province_id' => Yii::t('app', 'Province ID'),
        ];
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'province_id']);
    }

    /**
     * Gets query for [[Villages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVillages()
    {
        return $this->hasMany(Village::className(), ['district_id' => 'id']);
    }
}
