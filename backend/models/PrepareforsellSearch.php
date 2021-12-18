<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prepareforsell;

/**
 * PrepareforsellSearch represents the model behind the search form of `backend\models\Prepareforsell`.
 */
class PrepareforsellSearch extends Prepareforsell
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'waterid', 'quality', 'customerid', 'factoryid', 'userid'], 'integer'],
            [['sellprice', 'discount'], 'number'],
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
        $query = Prepareforsell::find();

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
            'waterid' => $this->waterid,
            'quality' => $this->quality,
            'sellprice' => $this->sellprice,
            'discount' => $this->discount,
            'customerid' => $this->customerid,
            'factoryid' => $this->factoryid,
            'userid' => $this->userid,
        ]);

        return $dataProvider;
    }
}
