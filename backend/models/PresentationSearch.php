<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Presentation;

/**
 * PresentationSearch represents the model behind the search form of `common\models\Presentation`.
 */
class PresentationSearch extends Presentation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'car_id' /*'is_constructor',*/, 'updated_at'], 'integer'],
            [[/*'model', 'modification',*/ 'created_at', 'body_color', 'interior_color', 'disks', 'year', 'price_usd', 'price_nds_usd', 'cash_usd', 'leasing_usd'], 'safe'],
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
        $query = Presentation::find();

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
            'car_id' => $this->car_id,
            // 'is_constructor' => $this->is_constructor,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ]);

        if($this->created_at)
            $query->andFilterWhere(['>=', 'created_at', strtotime($this->created_at)])
            ->andFilterWhere(['<=', 'created_at', strtotime('+1 day', strtotime($this->created_at))] );
        // $query->andFilterWhere(['like', 'model', $this->model])
        //     ->andFilterWhere(['like', 'modification', $this->modification])
        //     ->andFilterWhere(['like', 'body_color', $this->body_color])
        //     ->andFilterWhere(['like', 'interior_color', $this->interior_color])
        //     ->andFilterWhere(['like', 'disks', $this->disks])
        //     ->andFilterWhere(['like', 'year', $this->year])
        //     ->andFilterWhere(['like', 'price_usd', $this->price_usd])
        //     ->andFilterWhere(['like', 'price_nds_usd', $this->price_nds_usd])
        //     ->andFilterWhere(['like', 'cash_usd', $this->cash_usd])
        //     ->andFilterWhere(['like', 'leasing_usd', $this->leasing_usd]);

        return $dataProvider;
    }
}
