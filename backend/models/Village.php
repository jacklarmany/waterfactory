<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "village".
 *
 * @property int $id
 * @property string|null $villagename
 * @property int|null $district_id
 * @property int|null $province_id
 *
 * @property District $district
 * @property Province $province
 */
class Village extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'village';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id', 'province_id'], 'integer'],
            [['villagename'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
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
            'villagename' => Yii::t('app', 'Villagename'),
            'district_id' => Yii::t('app', 'District ID'),
            'province_id' => Yii::t('app', 'Province ID'),
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
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
}
