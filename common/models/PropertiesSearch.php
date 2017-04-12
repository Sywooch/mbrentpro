<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Properties;

/**
 * PropertiesSearch represents the model behind the search form about `common\models\Properties`.
 */
class PropertiesSearch extends Properties
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'propertyid', 'yearbuilt', 'numberunits', 'waitlist', 'nofee', 'unitid', 'isopentolease', 'rentisbasedonincome', 'bedrooms', 'fullbaths', 'halfbaths', 'ismobilityaccessible', 'isvisionaccessible', 'ishearingaccessible', 'isexists', 'leaseperiod', 'contactid', 'approvalstatus', 'dogs', 'cats', 'furnished', 'elevator', 'pool', 'wheelchair_access', 'laundry_type', 'parking_type', 'parkingfee', 'visibilitystatus', 'usertype'], 'integer'],
            [['description', 'address', 'city', 'state', 'zip', 'zip4', 'unittype', 'unitname', 'unitdescription', 'availabledate', 'rejectreason', 'youtube_url'], 'safe'],
            [['latitude', 'longitude', 'minrent', 'maxrent', 'mindeposit', 'maxdeposit', 'minsquarefeet', 'maxsquarefeet'], 'number'],
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
        $query = Properties::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        //echo "<pre>"; print_r(Yii::$app->request->queryParams);exit;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'propertyid' => $this->propertyid,
            'yearbuilt' => $this->yearbuilt,
            'numberunits' => $this->numberunits,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'waitlist' => $this->waitlist,
            'nofee' => $this->nofee,
            'unitid' => $this->unitid,
            'isopentolease' => $this->isopentolease,
            'rentisbasedonincome' => $this->rentisbasedonincome,
            //'minrent' => $this->minrent,
            //'maxrent' => $this->maxrent,
            'mindeposit' => $this->mindeposit,
            'maxdeposit' => $this->maxdeposit,
            'bedrooms' => $this->bedrooms,
            'fullbaths' => $this->fullbaths,
            'halfbaths' => $this->halfbaths,
            'minsquarefeet' => $this->minsquarefeet,
            'maxsquarefeet' => $this->maxsquarefeet,
            'ismobilityaccessible' => $this->ismobilityaccessible,
            'isvisionaccessible' => $this->isvisionaccessible,
            'ishearingaccessible' => $this->ishearingaccessible,
            'isexists' => $this->isexists,
            'availabledate' => $this->availabledate,
            'leaseperiod' => $this->leaseperiod,
            'contactid' => $this->contactid,
            'approvalstatus' => $this->approvalstatus,
            'dogs' => $this->dogs,
            'cats' => $this->cats,
            'furnished' => $this->furnished,
            'elevator' => $this->elevator,
            'pool' => $this->pool,
            'wheelchair_access' => $this->wheelchair_access,
            'laundry_type' => $this->laundry_type,
            'parking_type' => $this->parking_type,
            'parkingfee' => $this->parkingfee,
            'visibilitystatus' => $this->visibilitystatus,
            'usertype' => $this->usertype,
        ]);

        //->andFilterWhere(['like', 'description', $this->description])
            //->andFilterWhere(['like', 'address', $this->address])
            //->andFilterWhere(['like', 'city', $this->city])
            //->andFilterWhere(['like', 'state', $this->state])
            //->andFilterWhere(['like', 'zip', $this->zip])
            //->andFilterWhere(['like', 'zip4', $this->zip4])
            //->andFilterWhere(['like', 'unittype', $this->unittype])
            //->andFilterWhere(['like', 'unitname', $this->unitname])
            //->andFilterWhere(['like', 'unitdescription', $this->unitdescription])
            //->andFilterWhere(['like', 'rejectreason', $this->rejectreason])
            //->andFilterWhere(['like', 'youtube_url', $this->youtube_url])
            //->andFilterWhere(['>=', 'minrent', $this->minrent])
        $query->andFilterWhere(['between', 'minrent', $this->minrent, $this->maxrent]);;
        $query->andFilterWhere(['=', 'approvalstatus', 1]);

            //echo "<pre>"; print_r($query);exit;

        return $dataProvider;
    }
}
