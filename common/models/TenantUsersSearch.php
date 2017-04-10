<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TenantUsers;

/**
 * TenantUsersSearch represents the model behind the search form about `common\models\TenantUsers`.
 */
class TenantUsersSearch extends TenantUsers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stateid', 'cityid', 'no_of_children', 'user_type_id'], 'integer'],
            [['firstname', 'lastname', 'dateofbirth', 'marital_status', 'gender', 'mobileno', 'address', 'email', 'password', 'created', 'updated'], 'safe'],
            [['annual_income'], 'number'],
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
        $query = TenantUsers::find();

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
            'stateid' => $this->stateid,
            'cityid' => $this->cityid,
            'dateofbirth' => $this->dateofbirth,
            'annual_income' => $this->annual_income,
            'no_of_children' => $this->no_of_children,
            'user_type_id' => $this->user_type_id,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'mobileno', $this->mobileno])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
