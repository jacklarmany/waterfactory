<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id ລະຫັດລູກຄ້າ
 * @property string $fullname ຊື່ ແລະ ນາມສະກຸນ
 * @property string $dob ວັນ-ເດືອນ-ປີເກີດ
 * @property string $gender ເພດ
 * @property string $cardid ເລກບັດປະຈຳໂຕ
 * @property string $tel ເບີໂທລະສັບ
 * @property int $village ລະຫັດບ້ານ
 * @property int $district ລະຫັດເມືອງ
 * @property int $province ລະຫັດແຂວງ
 * @property int $factoryid ລະຫັດໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
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
            [['fullname', 'dob', 'gender', 'cardid', 'tel', 'village', 'district', 'province', 'factoryid', 'userid'], 'required'],
            [['dob'], 'safe'],
            [['village', 'district', 'province', 'factoryid', 'userid'], 'integer'],
            [['fullname'], 'string', 'max' => 70],
            [['gender'], 'string', 'max' => 7],
            [['cardid'], 'string', 'max' => 16],
            [['tel'], 'string', 'max' => 14],
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
            'fullname' => Yii::t('app', 'Fullname'),
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
