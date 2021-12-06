<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Wateradd;
use Yii;

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
            [['id', 'waterid', 'quality', 'factoryid', 'userid'], 'integer'],
            [['date', 'unit'], 'safe'],
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
        $query = Wateradd::find()->where(['factoryid' => $_SESSION['factoryid'], 'userid' => Yii::$app->user->id])->orderBy(['id' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
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
            'waterid' => $this->waterid,
            'quality' => $this->quality,
            'factoryid' => $this->factoryid,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
