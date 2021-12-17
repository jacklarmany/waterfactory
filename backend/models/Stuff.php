<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stuff".
 *
 * @property int $id ລະຫັດ
 * @property string $fullname ຊື່ ແລະ ນາມສະກຸນ
 * @property string $gender ເພດ
 * @property string $dob ວັນເດືອນປີເກີດ
 * @property string $card_id ເລກບັດປະຈຳໂຕ
 * @property string $tel ເບີໂທລະສັບ
 * @property int $province_id ລະຫັດແຂວງ
 * @property int $district_id ລະຫັດເມືອງ
 * @property int $village_id ລະຫັດບ້ານ
 * @property string|null $paysalary ຈ່າຍເງິນເດືອນ
 * @property int $position_id ລະຫັດຕຳແໜ່ງ
 * @property int $factory_id ລະຫັດໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
 *
 * @property Factory $factory
 * @property Position $position
 * @property Salarypaid[] $salarypas
 * @property Stuffasuser $stuffasuser
 */
class Stuff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stuff';
    }

    /**
     * {@inheritdoc}
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
            [['factory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Factory::className(), 'targetAttribute' => ['factory_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
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
            'gender' => Yii::t('app', 'Gender'),
            'dob' => Yii::t('app', 'Dob'),
            'card_id' => Yii::t('app', 'Card ID'),
            'tel' => Yii::t('app', 'Tel'),
            'province_id' => Yii::t('app', 'Province ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'village_id' => Yii::t('app', 'Village ID'),
            'paysalary' => Yii::t('app', 'Paysalary'),
            'position_id' => Yii::t('app', 'Position ID'),
            'factory_id' => Yii::t('app', 'Factory ID'),
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
        return $this->hasOne(Factory::className(), ['id' => 'factory_id']);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * Gets query for [[Salarypas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalarypas()
    {
        return $this->hasMany(Salarypaid::className(), ['stuffid' => 'id']);
    }

    /**
     * Gets query for [[Stuffasuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStuffasuser()
    {
        return $this->hasOne(Stuffasuser::className(), ['stuffid' => 'id']);
    }
}
