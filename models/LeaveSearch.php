<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Leave;

/**
 * LeaveSearch represents the model behind the search form of `app\models\Leave`.
 */
class LeaveSearch extends Leave
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lv_leave_id', 'leave_user_id', 'lv_status'], 'integer'],
            [['leave_subject', 'lv_date_raised', 'lv_start_date', 'lv_end_date'], 'safe'],
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
        $query = Leave::find();

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
            'lv_leave_id' => $this->lv_leave_id,
            'leave_user_id' => $this->leave_user_id,
            'lv_date_raised' => $this->lv_date_raised,
            'lv_start_date' => $this->lv_start_date,
            'lv_end_date' => $this->lv_end_date,
            'lv_status' => $this->lv_status,
        ]);

        $query->andFilterWhere(['like', 'leave_subject', $this->leave_subject]);

        return $dataProvider;
    }
}
