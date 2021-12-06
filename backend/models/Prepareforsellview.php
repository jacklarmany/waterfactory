<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prepareforsellview".
 *
 * @property int $id
 * @property int $waterid
 * @property int $quality
 * @property float $sellprice
 * @property float $amount
 * @property float|null $discount
 * @property float|null $amountdiscount
 * @property int|null $customerid
 * @property int $factoryid
 * @property int $userid
 */
class Prepareforsellview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prepareforsellview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'waterid', 'quality', 'customerid', 'factoryid', 'userid'], 'integer'],
            [['waterid', 'quality', 'sellprice', 'factoryid', 'userid'], 'required'],
            [['sellprice', 'amount', 'discount', 'amountdiscount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'waterid' => Yii::t('app', 'Waterid'),
            'quality' => Yii::t('app', 'Quality'),
            'sellprice' => Yii::t('app', 'Sellprice'),
            'amount' => Yii::t('app', 'Amount'),
            'discount' => Yii::t('app', 'Discount'),
            'amountdiscount' => Yii::t('app', 'Amountdiscount'),
            'customerid' => Yii::t('app', 'Customerid'),
            'factoryid' => Yii::t('app', 'Factoryid'),
            'userid' => Yii::t('app', 'Userid'),
        ];
    }
}