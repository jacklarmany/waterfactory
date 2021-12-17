<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "watersale".
 *
 * @property int $id ລະຫັດ
 * @property string $date ວັນທີ
 * @property string $time ເວລາ
 * @property int $waterid ລະຫັດນໍ້າດື່ມ
 * @property int $quantity ຈຳນວນຂາຍ
 * @property int $sellprice ລາຄາຂາຍ
 * @property float $amount ລວມເປັນເງິນ
 * @property int|null $discount ສ່ວນຫຼຸດ
 * @property float|null $amountdiscount ຈຳນວນເງິນທີ່ຫຼຸດ
 * @property float $totalreceiveamount ຈຳນວນເງິນຮັບຈາກລູກຄ້າ
 * @property int|null $customerid ລະຫັດລູກຄ້າ
 * @property string $billno ລະຫັດໃບບິນ
 * @property int|null $stuffasuserid ລະຫັດພະນັກງານຂາຍ
 * @property int $factoryid ລະຫັດໂຮງງານ
 * @property int|null $userid ລະຫັດເຈົ້າຂອງໂຮງງານ
 *
 * @property Water $water
 */
class Watersale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'watersale';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'time', 'waterid', 'quantity', 'sellprice', 'amount', 'totalreceiveamount', 'billno', 'factoryid'], 'required'],
            [['date', 'time'], 'safe'],
            [['waterid', 'quantity', 'sellprice', 'discount', 'customerid', 'stuffasuserid', 'factoryid', 'userid'], 'integer'],
            [['amount', 'amountdiscount', 'totalreceiveamount'], 'number'],
            [['billno'], 'string', 'max' => 50],
            [['waterid'], 'exist', 'skipOnError' => true, 'targetClass' => Water::className(), 'targetAttribute' => ['waterid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'time' => Yii::t('app', 'Time'),
            'waterid' => Yii::t('app', 'Waterid'),
            'quantity' => Yii::t('app', 'Quantity'),
            'sellprice' => Yii::t('app', 'Sellprice'),
            'amount' => Yii::t('app', 'Amount'),
            'discount' => Yii::t('app', 'Discount'),
            'amountdiscount' => Yii::t('app', 'Amountdiscount'),
            'totalreceiveamount' => Yii::t('app', 'Totalreceiveamount'),
            'customerid' => Yii::t('app', 'Customerid'),
            'billno' => Yii::t('app', 'Billno'),
            'stuffasuserid' => Yii::t('app', 'Stuffasuserid'),
            'factoryid' => Yii::t('app', 'Factoryid'),
            'userid' => Yii::t('app', 'Userid'),
        ];
    }

    /**
     * Gets query for [[Water]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWater()
    {
        return $this->hasOne(Water::className(), ['id' => 'waterid']);
    }
}
