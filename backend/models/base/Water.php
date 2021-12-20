<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "water".
 *
 * @property integer $id
 * @property string $image
 * @property string $watername
 * @property string $unit
 * @property integer $avalibledquantity
 * @property string $sellprice
 * @property integer $factoryid
 * @property integer $userid
 *
 * @property \backend\models\Factory $factory
 * @property \backend\models\Prepareforsell $prepareforsell
 * @property \backend\models\WaterTranslate[] $waterTranslates
 * @property \backend\models\Wateradd[] $wateradds
 * @property \backend\models\Watersale[] $watersales
 * @property string $aliasModel
 */
abstract class Water extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'water';
    }

    /**
     * @inheritdoc
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
            'image' => Yii::t('models', 'Image'),
            'watername' => Yii::t('models', 'Watername'),
            'unit' => Yii::t('models', 'Unit'),
            'avalibledquantity' => Yii::t('models', 'Avalibledquantity'),
            'sellprice' => Yii::t('models', 'Sellprice'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrepareforsell()
    {
        return $this->hasOne(\backend\models\Prepareforsell::className(), ['waterid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaterTranslates()
    {
        return $this->hasMany(\backend\models\WaterTranslate::className(), ['waterid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWateradds()
    {
        return $this->hasMany(\backend\models\Wateradd::className(), ['waterid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWatersales()
    {
        return $this->hasMany(\backend\models\Watersale::className(), ['waterid' => 'id']);
    }




}