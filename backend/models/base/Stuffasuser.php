<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "stuffasuser".
 *
 * @property integer $id
 * @property string $uname
 * @property string $pword
 * @property integer $status
 * @property integer $stuffid
 * @property integer $factoryid
 *
 * @property \backend\models\Stuff $stuff
 * @property string $aliasModel
 */
abstract class Stuffasuser extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stuffasuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uname', 'pword', 'stuffid', 'factoryid'], 'required'],
            [['status', 'stuffid', 'factoryid'], 'integer'],
            [['uname', 'pword'], 'string', 'max' => 255],
            [['stuffid'], 'unique'],
            [['stuffid'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Stuff::className(), 'targetAttribute' => ['stuffid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'uname' => Yii::t('models', 'Uname'),
            'pword' => Yii::t('models', 'Pword'),
            'status' => Yii::t('models', 'Status'),
            'stuffid' => Yii::t('models', 'Stuffid'),
            'factoryid' => Yii::t('models', 'Factoryid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStuff()
    {
        return $this->hasOne(\backend\models\Stuff::className(), ['id' => 'stuffid']);
    }




}
