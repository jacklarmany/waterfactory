<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "position_translate".
 *
 * @property int $id
 * @property int|null $language
 * @property string|null $positionname
 * @property int|null $positionid
 *
 * @property Position $position
 */
class PositionTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language', 'positionid'], 'integer'],
            [['positionname'], 'string', 'max' => 50],
            [['positionid'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['positionid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language' => Yii::t('app', 'Language'),
            'positionname' => Yii::t('app', 'Positionname'),
            'positionid' => Yii::t('app', 'Positionid'),
        ];
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'positionid']);
    }
}
