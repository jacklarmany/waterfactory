<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "position_translate".
 *
 * @property integer $id
 * @property integer $language
 * @property string $positionname
 * @property integer $positionid
 *
 * @property \backend\models\Position $position
 * @property string $aliasModel
 */
abstract class PositionTranslate extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language', 'positionid'], 'integer'],
            [['positionname'], 'string', 'max' => 50],
            [['positionid'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Position::className(), 'targetAttribute' => ['positionid' => 'id']]
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
            'positionname' => Yii::t('models', 'Positionname'),
            'positionid' => Yii::t('models', 'Positionid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(\backend\models\Position::className(), ['id' => 'positionid']);
    }




}
