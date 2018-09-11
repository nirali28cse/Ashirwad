<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_type_id', 'potency_id', 'quantity_type_id', 'total_in', 'total_out', 'balance'], 'integer'],
            [['name', 'abbreviations', 'date_of_purchase', 'date_of_mfg', 'date_of_expiry', 'issue_date', 'status', 'date_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
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
            'product_type_id' => $this->product_type_id,
            'potency_id' => $this->potency_id,
            'quantity_type_id' => $this->quantity_type_id,
            'date_of_purchase' => $this->date_of_purchase,
            'date_of_mfg' => $this->date_of_mfg,
            'date_of_expiry' => $this->date_of_expiry,
            'issue_date' => $this->issue_date,
            'total_in' => $this->total_in,
            'total_out' => $this->total_out,
            'balance' => $this->balance,
            'date_time' => $this->date_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'abbreviations', $this->abbreviations])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
