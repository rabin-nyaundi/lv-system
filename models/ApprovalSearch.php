<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Approval;

/**
 * ApprovalSearch represents the model behind the search form of `app\models\Approval`.
 */
class ApprovalSearch extends Approval
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['approval_id', 'approval_user_id', 'approval_leave_id', 'approver_id', 'approval_status'], 'integer'],
            [['approval_date', 'Remarks'], 'safe'],
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
        $query = Approval::find();

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
            'approval_id' => $this->approval_id,
            'approval_user_id' => $this->approval_user_id,
            'approval_leave_id' => $this->approval_leave_id,
            'approver_id' => $this->approver_id,
            'approval_date' => $this->approval_date,
            'approval_status' => $this->approval_status,
        ]);

        $query->andFilterWhere(['like', 'Remarks', $this->Remarks]);

        return $dataProvider;
    }
}
