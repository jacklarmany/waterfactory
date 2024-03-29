<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "customer".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $dob
 * @property string $gender
 * @property string $cardid
 * @property string $tel
 * @property integer $village
 * @property integer $district
 * @property integer $province
 * @property integer $factoryid
 * @property integer $userid
 *
 * @property \backend\models\Factory $factory
 * @property string $aliasModel
 */
abstract class Customer extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'dob', 'gender', 'cardid', 'tel', 'village', 'district', 'province', 'factoryid', 'userid'], 'required'],
            [['dob'], 'safe'],
            [['village', 'district', 'province', 'factoryid', 'userid'], 'integer'],
            [['fullname'], 'string', 'max' => 70],
            [['gender'], 'string', 'max' => 7],
            [['cardid'], 'string', 'max' => 16],
            [['tel'], 'string', 'max' => 14],
            [['factoryid'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Factory::className(), 'targetAttribute' => ['factoryid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'fullname' => Yii::t('models', 'Fullname'),
            'dob' => Yii::t('models', 'Dob'),
            'gender' => Yii::t('models', 'Gender'),
            'cardid' => Yii::t('models', 'Cardid'),
            'tel' => Yii::t('models', 'Tel'),
            'village' => Yii::t('models', 'Village'),
            'district' => Yii::t('models', 'District'),
            'province' => Yii::t('models', 'Province'),
            'factoryid' => Yii::t('models', 'Factoryid'),
            'userid' => Yii::t('models', 'Userid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(\backend\models\Factory::className(), ['id' => 'factoryid']);
    }




}
