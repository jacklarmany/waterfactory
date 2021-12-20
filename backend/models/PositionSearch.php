<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Position;

/**
 * PositionSearch represents the model behind the search form of `backend\models\Position`.
 */
class PositionSearch extends Position
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'factoryid', 'userid'], 'integer'],
            [['positionname'], 'safe'],
            [['salary'], 'number'],
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
        $query = Position::find();

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
            'salary' => $this->salary,
            'factoryid' => $this->factoryid,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'positionname', $this->positionname]);

        return $dataProvider;
    }
}
