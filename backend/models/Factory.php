<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "factory".
 *
 * @property int $id
 * @property string $factoryname
 * @property int $userid
 *
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
            [['factoryname'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'factoryname' => Yii::t('app', 'Factoryname'),
            'userid' => Yii::t('app', 'Userid'),
        ];
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
