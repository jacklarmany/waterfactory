<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stuffasuser".
 *
 * @property int $id ລະຫັດ
 * @property string $uname ຊື່ຜູ້ໃຊ້
 * @property string $pword ລະຫັດຜ່ານ
 * @property int $stuffid ລະຫັດພະນັກງານ
 * @property int $factoryid ລະຫັດໂຮງງານ
 *
 * @property Stuff $stuff
 */
class Stuffasuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stuffasuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uname', 'pword', 'stuffid', 'factoryid'], 'required'],
            [['stuffid', 'factoryid'], 'integer'],
            [['uname', 'pword'], 'string', 'max' => 255],
            [['stuffid'], 'exist', 'skipOnError' => true, 'targetClass' => Stuff::className(), 'targetAttribute' => ['stuffid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uname' => Yii::t('app', 'Uname'),
            'pword' => Yii::t('app', 'Pword'),
            'stuffid' => Yii::t('app', 'Stuffid'),
            'factoryid' => Yii::t('app', 'Factoryid'),
        ];
    }

    /**
     * Gets query for [[Stuff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStuff()
    {
        return $this->hasOne(Stuff::className(), ['id' => 'stuffid']);
    }
}
