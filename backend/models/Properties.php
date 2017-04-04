<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "propertiesnew".
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
 * @property integer $unitid
 * @property string $unittype
 * @property string $unitname
 * @property string $unitdescription
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
 * @property integer $isexists
 * @property string $availabledate
 * @property integer $leaseperiod
 * @property integer $contactid
 * @property integer $availablitystatus
 * @property integer $approvalstatus
 * @property string $rejectreason
 * @property integer $dogs
 * @property integer $cats
 * @property integer $furnished
 * @property integer $elevator
 * @property integer $pool
 * @property integer $wheelchair_access
 * @property integer $laundry_type
 * @property integer $parking_type
 * @property integer $parkingfee
 * @property string $youtube_url
 * @property integer $visibilitystatus
 * @property integer $usertype
 */
class Properties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propertiesnew';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid', 'description', 'address', 'city', 'state', 'zip', 'zip4', 'yearbuilt', 'numberunits', 'latitude', 'longitude', 'waitlist', 'isopentolease', 'rentisbasedonincome', 'minrent', 'maxrent', 'mindeposit', 'maxdeposit', 'bedrooms', 'fullbaths', 'halfbaths', 'minsquarefeet', 'maxsquarefeet', 'ismobilityaccessible', 'isvisionaccessible', 'ishearingaccessible', 'isexists', 'usertype'], 'required'],
            [['propertyid', 'yearbuilt', 'numberunits', 'waitlist', 'nofee', 'unitid', 'isopentolease', 'rentisbasedonincome', 'bedrooms', 'fullbaths', 'halfbaths', 'ismobilityaccessible', 'isvisionaccessible', 'ishearingaccessible', 'isexists', 'leaseperiod', 'contactid', 'availablitystatus', 'approvalstatus', 'dogs', 'cats', 'furnished', 'elevator', 'pool', 'wheelchair_access', 'laundry_type', 'parking_type', 'parkingfee', 'visibilitystatus', 'usertype'], 'integer'],
            [['description', 'unitdescription', 'rejectreason'], 'string'],
            [['latitude', 'longitude', 'minrent', 'maxrent', 'mindeposit', 'maxdeposit', 'minsquarefeet', 'maxsquarefeet'], 'number'],
            [['availabledate'], 'safe'],
            [['address', 'unittype', 'unitname', 'youtube_url'], 'string', 'max' => 255],
            [['city', 'state'], 'string', 'max' => 100],
            [['zip'], 'string', 'max' => 10],
            [['zip4'], 'string', 'max' => 5],
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
            'unitid' => 'Unitid',
            'unittype' => 'Unittype',
            'unitname' => 'Unitname',
            'unitdescription' => 'Unitdescription',
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
            'isexists' => 'Isexists',
            'availabledate' => 'Availabledate',
            'leaseperiod' => 'Leaseperiod',
            'contactid' => 'Contactid',
            'availablitystatus' => 'Availablitystatus',
            'approvalstatus' => 'Approvalstatus',
            'rejectreason' => 'Rejectreason',
            'dogs' => 'Dogs',
            'cats' => 'Cats',
            'furnished' => 'Furnished',
            'elevator' => 'Elevator',
            'pool' => 'Pool',
            'wheelchair_access' => 'Wheelchair Access',
            'laundry_type' => 'Laundry Type',
            'parking_type' => 'Parking Type',
            'parkingfee' => 'Parkingfee',
            'youtube_url' => 'Youtube Url',
            'visibilitystatus' => 'Visibilitystatus',
            'usertype' => 'Usertype',
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
