<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "unit_translate".
 *
 * @property integer $id
 * @property string $language
 * @property string $unitname
 * @property integer $unit_id
 *
 * @property \backend\models\UnitTranslate $unit
 * @property \backend\models\UnitTranslate[] $unitTranslates
 * @property string $aliasModel
 */
abstract class UnitTranslate extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_id'], 'required'],
            [['unit_id'], 'integer'],
            [['language'], 'string', 'max' => 5],
            [['unitname'], 'string', 'max' => 10],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\UnitTranslate::className(), 'targetAttribute' => ['unit_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'language' => Yii::t('models', 'Language'),
            'unitname' => Yii::t('models', 'Unitname'),
            'unit_id' => Yii::t('models', 'Unit ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(\backend\models\UnitTranslate::className(), ['id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitTranslates()
    {
        return $this->hasMany(\backend\models\UnitTranslate::className(), ['unit_id' => 'id']);
    }




}
