<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_phone', 'department', 'user_type'], 'integer'],
            [['emp_no', 'user_fname', 'user_lname', 'user_email', 'user_pswd'], 'safe'],
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
        $query = Users::find();

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
            'user_phone' => $this->user_phone,
            'department' => $this->department,
            'user_type' => $this->user_type,
        ]);

        $query->andFilterWhere(['like', 'emp_no', $this->emp_no])
            ->andFilterWhere(['like', 'user_fname', $this->user_fname])
            ->andFilterWhere(['like', 'user_lname', $this->user_lname])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_pswd', $this->user_pswd]);

        return $dataProvider;
    }
}
