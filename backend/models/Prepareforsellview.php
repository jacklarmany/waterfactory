<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prepareforsellview".
 *
 * @property int $id ລະຫັດ
 * @property int $waterid ລະຫັດນໍ້າດື່ມ
 * @property int $quality ຈຳນວນ
 * @property float $sellprice ລາຄາຂາຍ
 * @property float $amount
 * @property float|null $discount ສ່ວນຫຼຸດ
 * @property float|null $amountdiscount
 * @property int|null $customerid ລະຫັດລູກຄ້າ
 * @property int $factoryid ລະຫັດໂຮງງານ
 * @property int $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
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
