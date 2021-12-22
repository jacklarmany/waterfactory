<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Watersale;
use Yii;

/**
 * WatersaleSearch represents the model behind the search form of `backend\models\Watersale`.
 */
class WatersaleSearch extends Watersale
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'waterid', 'quantity', 'sellprice', 'discount', 'customerid', 'stuffasuserid', 'factoryid', 'userid'], 'integer'],
            [['date', 'time', 'billno'], 'safe'],
            [['amount', 'amountdiscount', 'totalreceiveamount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Watersale::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'time' => $this->time,
            'waterid' => $this->waterid,
            'quantity' => $this->quantity,
            'sellprice' => $this->sellprice,
            'amount' => $this->amount,
            'discount' => $this->discount,
            'amountdiscount' => $this->amountdiscount,
            'totalreceiveamount' => $this->totalreceiveamount,
            'customerid' => $this->customerid,
            'stuffasuserid' => $this->stuffasuserid,
            'factoryid' => $_SESSION['factoryid'],
            'userid' => Yii::$app->user->id,
        ]);

        $query->andFilterWhere(['like', 'billno', $this->billno]);

        return $dataProvider;
    }
}