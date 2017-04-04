<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Propertyphoto;

/**
 * PropertyphotoSearch represents the model behind the search form about `common\models\Propertyphoto`.
 */
class PropertyphotoSearch extends Propertyphoto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'propertyid', 'isprimary', 'isexists'], 'integer'],
            [['imageurl', 'modificationdate'], 'safe'],
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
        $query = Propertyphoto::find();

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
            'propertyid' => $this->propertyid,
            'modificationdate' => $this->modificationdate,
            'isprimary' => $this->isprimary,
            'isexists' => $this->isexists,
        ]);

        $query->andFilterWhere(['like', 'imageurl', $this->imageurl]);

        return $dataProvider;
    }
}
