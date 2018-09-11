<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductOut;

/**
 * ProductOutSearch represents the model behind the search form of `app\models\ProductOut`.
 */
class ProductOutSearch extends ProductOut
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'buyer_user_id', 'seller_user_id', 'product_type_id', 'potency_id', 'quantity_type_id', 'product_id', 'total_qty'], 'integer'],
            [['notes', 'status', 'date_time'], 'safe'],
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
        $query = ProductOut::find();

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
            'buyer_user_id' => $this->buyer_user_id,
            'seller_user_id' => $this->seller_user_id,
            'product_type_id' => $this->product_type_id,
            'potency_id' => $this->potency_id,
            'quantity_type_id' => $this->quantity_type_id,
            'product_id' => $this->product_id,
            'total_qty' => $this->total_qty,
            'date_time' => $this->date_time,
        ]);

        $query->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
