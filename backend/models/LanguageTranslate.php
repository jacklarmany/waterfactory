<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "language_translate".
 *
 * @property int $id
 * @property string $language
 * @property string|null $translation
 *
 * @property LanguageSource $id0
 * @property Language $language0
 */
class LanguageTranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'language'], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 5],
            [['id', 'language'], 'unique', 'targetAttribute' => ['id', 'language']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language' => 'language_id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => LanguageSource::className(), 'targetAttribute' => ['id' => 'id']],
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
            'translation' => Yii::t('app', 'Translation'),
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(LanguageSource::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Language0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage0()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language']);
    }
}
