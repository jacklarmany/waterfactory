<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Wateradd;

/**
 * WateraddSearch represents the model behind the search form of `backend\models\Wateradd`.
 */
class WateraddSearch extends Wateradd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'waterid', 'quantity', 'unitid', 'factoryid', 'userid'], 'integer'],
            [['date', 'time'], 'safe'],
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
        $query = Wateradd::find();

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
            'unitid' => $this->unitid,
            'factoryid' => $_SESSION['factoryid'],
            'userid' => Yii::$app->user->id,
        ]);

        return $dataProvider;
    }
}
