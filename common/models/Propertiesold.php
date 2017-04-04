<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "properties".
 *
 * @property integer $id
 * @property integer $propertyid
 * @property string $description
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $zip4
 * @property integer $yearbuilt
 * @property integer $numberunits
 * @property double $latitude
 * @property double $longitude
 * @property integer $waitlist
 * @property integer $nofee
 * @property string $unittype
 * @property string $unitname
 * @property integer $isopentolease
 * @property integer $rentisbasedonincome
 * @property double $minrent
 * @property double $maxrent
 * @property double $mindeposit
 * @property double $maxdeposit
 * @property integer $bedrooms
 * @property integer $fullbaths
 * @property integer $halfbaths
 * @property double $minsquarefeet
 * @property double $maxsquarefeet
 * @property integer $ismobilityaccessible
 * @property integer $isvisionaccessible
 * @property integer $ishearingaccessible
 * @property string $unitdescription
 * @property integer $unitid
 * @property integer $isexists
 */
class Properties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'properties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid'], 'required'],
            [['propertyid', 'yearbuilt', 'numberunits', 'waitlist', 'nofee', 'isopentolease', 'rentisbasedonincome', 'bedrooms', 'fullbaths', 'halfbaths', 'ismobilityaccessible', 'isvisionaccessible', 'ishearingaccessible', 'unitid', 'isexists'], 'integer'],
            [['description', 'unitdescription'], 'string'],
            [['latitude', 'longitude', 'minrent', 'maxrent', 'mindeposit', 'maxdeposit', 'minsquarefeet', 'maxsquarefeet'], 'number'],
            [['address', 'city', 'state', 'unittype', 'unitname'], 'string', 'max' => 255],
            [['zip'], 'string', 'max' => 10],
            [['zip4'], 'string', 'max' => 4],
            //[['unitid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propertyid' => 'Propertyid',
            'description' => 'Description',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'zip4' => 'Zip4',
            'yearbuilt' => 'Yearbuilt',
            'numberunits' => 'Numberunits',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'waitlist' => 'Waitlist',
            'nofee' => 'Nofee',
            'unittype' => 'Unittype',
            'unitname' => 'Unitname',
            'isopentolease' => 'Isopentolease',
            'rentisbasedonincome' => 'Rentisbasedonincome',
            'minrent' => 'Minrent',
            'maxrent' => 'Maxrent',
            'mindeposit' => 'Mindeposit',
            'maxdeposit' => 'Maxdeposit',
            'bedrooms' => 'Bedrooms',
            'fullbaths' => 'Fullbaths',
            'halfbaths' => 'Halfbaths',
            'minsquarefeet' => 'Minsquarefeet',
            'maxsquarefeet' => 'Maxsquarefeet',
            'ismobilityaccessible' => 'Ismobilityaccessible',
            'isvisionaccessible' => 'Isvisionaccessible',
            'ishearingaccessible' => 'Ishearingaccessible',
            'unitdescription' => 'Unitdescription',
            'unitid' => 'Unitid',
            'isexists' => 'Isexists',
        ];
    }

    public function getOnePropertyPhoto($propertyid)
    {
        //return $this->hasMany(Propertyphoto::className(),['propertyid', 'propertyid']);
        //echo "<pre>";
        $model = Propertyphoto::find()->where(['propertyid' => $propertyid])->one();
        //print_r($model);exit;
        return $model;
    }


}
