<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "water".
 *
 * @property int $id ລະຫັດ
 * @property string $image ຮູບພາບຂອງນໍ້າ
 * @property string $watername ຊື່ນໍ້າດື່ມ
 * @property string $unit ຫົວໜ່ວຍ
 * @property int|null $avalibledquantity ຈຳນວນນໍ້າທີ່ຍັງເຫຼືອ
 * @property float $sellprice ລາຄາຂາຍ
 * @property int $factoryid ລະຫັດໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
 *
 * @property Factory $factory
 * @property Prepareforsell $prepareforsell
 * @property WaterTranslate[] $waterTranslates
 * @property Wateradd[] $wateradds
 * @property Watersale[] $watersales
 */
class Water extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'water';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'watername', 'unit', 'sellprice', 'factoryid', 'userid'], 'required'],
            [['avalibledquantity', 'factoryid', 'userid'], 'integer'],
            [['sellprice'], 'number'],
            [['image'], 'string', 'max' => 255],
            [['watername'], 'string', 'max' => 100],
            [['unit'], 'string', 'max' => 10],
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
            'image' => Yii::t('app', 'Image'),
            'watername' => Yii::t('app', 'Watername'),
            'unit' => Yii::t('app', 'Unit'),
            'avalibledquantity' => Yii::t('app', 'Avalibledquantity'),
            'sellprice' => Yii::t('app', 'Sellprice'),
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

    /**
     * Gets query for [[Prepareforsell]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrepareforsell()
    {
        return $this->hasOne(Prepareforsell::className(), ['waterid' => 'id']);
    }

    /**
     * Gets query for [[WaterTranslates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWaterTranslates()
    {
        return $this->hasMany(WaterTranslate::className(), ['waterid' => 'id']);
    }

    /**
     * Gets query for [[Wateradds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWateradds()
    {
        return $this->hasMany(Wateradd::className(), ['waterid' => 'id']);
    }

    /**
     * Gets query for [[Watersales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWatersales()
    {
        return $this->hasMany(Watersale::className(), ['waterid' => 'id']);
    }
}
