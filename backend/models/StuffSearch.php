<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Stuff;

/**
 * StuffSearch represents the model behind the search form of `backend\models\Stuff`.
 */
class StuffSearch extends Stuff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'district_id', 'village_id', 'post_id', 'factory_id', 'userid'], 'integer'],
            [['fullname', 'gender', 'dob', 'card_id', 'tel', 'paysalary'], 'safe'],
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
        $query = Stuff::find();

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
            'dob' => $this->dob,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'village_id' => $this->village_id,
            'paysalary' => $this->paysalary,
            'post_id' => $this->post_id,
            'factory_id' => $this->factory_id,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'card_id', $this->card_id])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
}
