<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Stuffasuser;

/**
 * StuffasuserSearch represents the model behind the search form of `backend\models\Stuffasuser`.
 */
class StuffasuserSearch extends Stuffasuser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stuffid', 'factoryid'], 'integer'],
            [['uname', 'pword'], 'safe'],
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
        $query = Stuffasuser::find();

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
            'stuffid' => $this->stuffid,
            'factoryid' => $this->factoryid,
        ]);

        $query->andFilterWhere(['like', 'uname', $this->uname])
            ->andFilterWhere(['like', 'pword', $this->pword]);

        return $dataProvider;
    }
}
