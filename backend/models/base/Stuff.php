<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "stuff".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $gender
 * @property string $dob
 * @property string $card_id
 * @property string $tel
 * @property integer $province_id
 * @property integer $district_id
 * @property integer $village_id
 * @property string $paysalary
 * @property integer $position_id
 * @property integer $factory_id
 * @property integer $userid
 *
 * @property \backend\models\Factory $factory
 * @property \backend\models\Position $position
 * @property \backend\models\Salarypaid[] $salarypas
 * @property \backend\models\Stuffasuser $stuffasuser
 * @property string $aliasModel
 */
abstract class Stuff extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stuff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'gender', 'dob', 'card_id', 'tel', 'province_id', 'district_id', 'village_id', 'position_id', 'factory_id', 'userid'], 'required'],
            [['dob', 'paysalary'], 'safe'],
            [['province_id', 'district_id', 'village_id', 'position_id', 'factory_id', 'userid'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 6],
            [['card_id'], 'string', 'max' => 16],
            [['tel'], 'string', 'max' => 14],
            [['factory_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Factory::className(), 'targetAttribute' => ['factory_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Position::className(), 'targetAttribute' => ['position_id' => 'id']]
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
            'gender' => Yii::t('models', 'Gender'),
            'dob' => Yii::t('models', 'Dob'),
            'card_id' => Yii::t('models', 'Card ID'),
            'tel' => Yii::t('models', 'Tel'),
            'province_id' => Yii::t('models', 'Province ID'),
            'district_id' => Yii::t('models', 'District ID'),
            'village_id' => Yii::t('models', 'Village ID'),
            'paysalary' => Yii::t('models', 'Paysalary'),
            'position_id' => Yii::t('models', 'Position ID'),
            'factory_id' => Yii::t('models', 'Factory ID'),
            'userid' => Yii::t('models', 'Userid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(\backend\models\Factory::className(), ['id' => 'factory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(\backend\models\Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalarypas()
    {
        return $this->hasMany(\backend\models\Salarypaid::className(), ['stuffid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuffasuser()
    {
        return $this->hasOne(\backend\models\Stuffasuser::className(), ['stuffid' => 'id']);
    }




}
