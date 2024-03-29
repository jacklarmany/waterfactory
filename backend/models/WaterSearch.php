<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Water;
use Yii;

/**
 * WaterSearch represents the model behind the search form of `backend\models\Water`.
 */
class WaterSearch extends Water
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unitid', 'avalibledquantity', 'factoryid', 'userid'], 'integer'],
            [['image', 'watername'], 'safe'],
            [['sellprice'], 'number'],
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
        $query = Water::find();

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
            'unitid' => $this->unitid,
            'avalibledquantity' => $this->avalibledquantity,
            'sellprice' => $this->sellprice,
            'factoryid' => $_SESSION['factoryid'],
            'userid' => Yii::$app->user->id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'watername', $this->watername]);

        return $dataProvider;
    }
}
