<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\models\SignupForm;
// use backend\models\Properties;
// use backend\models\Amenities;
// use backend\models\Propertyphoto;
// use backend\models\Propertytype;
// use backend\models\Unitphoto;

use common\models\Properties;
use common\models\Amenities;
use common\models\Propertyphoto;
use common\models\Propertytype;
use common\models\Unitphoto;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'rules' => [
        [
            'actions' => ['login', 'error','fetch-update-data','signup'],
            'allow' => true,
        ],
        [
        'actions' => ['logout', 'index'],
        'allow' => true,
        'roles' => ['@'],
        ],
        ],
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'logout' => ['post'],
        ],
        ],
        ];
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
    
        return $this->render('signup', [
                'model' => $model,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        'error' => [
        'class' => 'yii\web\ErrorAction',
        ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
            'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /*public function actionFetchUpdateData()
    {
        $url = 'http://localhost/mbproperty/backend/web/data.xml';
        $xmldata = file_get_contents($url);
        $sl = str_replace("r:", "", $xmldata);
        $xml = simplexml_load_string($sl,"SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        echo "<pre>"; print_r($array);exit;
    }*/

    public function actionFetchUpdateData()
    {
        $url = 'http://877rentpro.rentlinx.com/data.xml';
        //$url = 'data.xml';
        $xmldata = file_get_contents($url);
        $sl = str_replace("r:", "", $xmldata);
        $xml = simplexml_load_string($sl,"SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //echo "<pre>"; //print_r($array);exit;
        $propertyids=[];
        $amenityids=[];
        $propertyPhotoids=[];
        $propertyTypeids=[];
        $unitPhotoids=[];
        
        $this->updateProperties();

        foreach ($array['Properties']['Property'] as $property)
        {
            //print_r($property['Amenity']);
            $myprop = [];
            $amenities= [];
            $propertytypes= [];
            $propertyphotos= [];
            $properties= [];
            $units= [];
            $ppt=[];
            $unitphotos=[];
            foreach ($property as $key => $value) {
                if($key == "@attributes")
                {
                    $ppt["propertyid"] = $value['LocalPropertyID'];
                    // inserting LocalPropertyID into propertyids, so that we can delete from database the ids that are not in propertyids array 
                    $propertyids[]=$value['LocalPropertyID'];
                }
                
                else if($key == 'Amenity')
                {

                    foreach ($value as $amenity) {
                        if(is_array($amenity))
                        {
                            if(isset($amenity['@attributes']))
                            {
                                $amty['propertyid'] = $ppt["propertyid"];
                                $amty['amenityid'] = $amenity['@attributes']['AmenityID'];

                                $amenities[] = $amty;
                            }
                            else if(is_array($amenity))
                            {
                                $amty['propertyid'] = $ppt["propertyid"];
                                $amty['amenityid'] = $amenity['AmenityID'];
                                $amenities[] = $amty;
                            }
                        }

                    }
                }
                else if($key == 'PropertyPhoto')
                {
                    foreach ($value as $t) {
                        if(is_array($t))
                        {
                            foreach ($t as $tt) {
                                if(is_array($tt))
                                {
                                    $proppic = [];
                                    $proppic['propertyid'] = $ppt["propertyid"];
                                    foreach ($tt as $ttkey => $ttvalue) {
                                        //if($ttkey == 'modificationdate')
                                        //{
                                            //$proppic[$ttkey] = date("Y-m-d H:i:s",strtotime($ttvalue));
                                        //}
                                        $proppic[$ttkey] = $ttvalue;
                                    }
                                    $propertyphotos[] = $proppic;
                                }
                                else
                                {
                                    $proppic = [];
                                    $proppic['propertyid'] = $ppt["propertyid"];
                                    foreach ($t as $ttkey=>$ttvalue) {
                                        $proppic[$ttkey] = $ttvalue;
                                    }
                                    $propertyphotos[] = $proppic;
                                    break;
                                }
                            }
                        }
                        else
                        {
                                //echo "t is not array";
                                //print_r($t);
                        }
                    }

                    // }

                    // foreach ($value as $propphoto) {
                    //     if(is_array($propphoto) && count($propphoto) >1)
                    //     {
                    //         $proppic = [];
                    //         $proppic['propertyid'] = $ppt["propertyid"];
                    //         if(isset($propphoto['@attributes']['ImageUrl']))
                    //             $proppic['imageurl'] = $propphoto['@attributes']['ImageUrl'];
                    //         if(isset($propphoto['@attributes']['ModificationDate']))
                    //             $proppic['modificationdate'] = $propphoto['@attributes']['ModificationDate'];
                    //         if(isset($propphoto['@attributes']['Primary']))
                    //             $proppic['primary'] = $propphoto['@attributes']['Primary'];
                    //         //print_r($proppic);
                    //         $propertyphotos[] = $proppic;
                    //     }
                    //     else
                    //     {
                    //         //echo "string==>";
                    //         //print_r($propphoto);
                    //     }
                    // }
                }
                else if($key == 'PropertyType')
                {
                    if(is_array($value))
                    {
                        foreach ($value as $ptypename) {
                            $pts = [];
                            $pts['propertyid'] = $ppt["propertyid"];
                            $pts['type'] = $ptypename;
                            $propertytypes[] = $pts;
                        }
                    }
                    else
                    {
                        $pts = [];
                        $pts['propertyid'] = $ppt["propertyid"];
                        $pts['type'] = $value;
                        $propertytypes[] = $pts;
                    }
                }

                else if($key == 'Unit')
                {
                    foreach ($value as $theunit) {

                        if(is_array($theunit) && count($theunit) >1)
                        {
                            $uts = [];
                            $uts['propertyid'] = $ppt["propertyid"];
                            foreach ($theunit as $theunitkey => $theunitvalue) {
                                if ($theunitkey == "UnitPhoto")
                                {
                                    foreach ($theunitvalue as $item) {
                                        //print_r($item);
                                        $kp=[];
                                        $kp['propertyid'] = $ppt['propertyid'];
                                        $kp['unitid'] = $uts['unitid'];
                                        if(isset($item['@attributes']['ImageUrl']))
                                            $kp['imageurl'] = $item['@attributes']['ImageUrl'];
                                        if(isset($item['@attributes']['ModificationDate']))
                                            $kp['modificationdate'] = $item['@attributes']['ModificationDate'];
                                        if(isset($item['@attributes']['Primary']))
                                            $kp['primary'] = $item['@attributes']['Primary'];

                                        $unitphotos[] = $kp;
                                    }
                                }
                                else if($theunitkey != '@attributes' && $theunitkey != "UnitPhoto")
                                    $uts[$theunitkey]= $theunitvalue;
                                else
                                    $uts['unitid'] = $theunit["@attributes"]["LocalUnitID"];
                            }
                            $units[]= $uts;
                        }
                        else
                        {
                            //echo "<br>in else<br>";
                            $uts = [];
                            $uts['propertyid'] = $ppt["propertyid"];
                            foreach ($value as $theunitkey => $theunitvalue) {
                                if ($theunitkey == "UnitPhoto")
                                {
                                    foreach ($theunitvalue as $item) {
                                        //print_r($item);
                                        $kp=[];
                                        $kp['propertyid'] = $ppt['propertyid'];
                                        $kp['unitid'] = $uts['unitid'];
                                        if(isset($item['@attributes']['ImageUrl']))
                                            $kp['imageurl'] = $item['@attributes']['ImageUrl'];
                                        if(isset($item['@attributes']['ModificationDate']))
                                            $kp['modificationdate'] = $item['@attributes']['ModificationDate'];
                                        if(isset($item['@attributes']['Primary']))
                                            $kp['primary'] = $item['@attributes']['Primary'];
                                        $unitphotos[] = $kp;
                                    }
                                }
                                else if($theunitkey != '@attributes' && $theunitkey != "UnitPhoto")
                                    $uts[$theunitkey]= $theunitvalue;
                                else
                                    $uts['unitid'] = $value["@attributes"]["LocalUnitID"];
                            }
                            $units[]= $uts;
                            break;
                        }
                        
                        // $uts= [];
                        // foreach ($theunit as $theunitkey => $theunitvalue) {
                        //     echo "<br>---start---<br>";
                        //     print_r($theunitkey);
                        //     echo "::";
                        //     print_r($theunitvalue);
                        //     echo "<br>---end---<br>";

                        //     //echo $theunitkey."<br>";
                        //     //$uts[$theunitkey] = $theunitvalue;
                        // }
                        //print_r($uts);
                    }
                    
                }
                else
                    $ppt[$key] = $value;
            }
            //print_r($units);
            foreach ($units as $unit) {
                foreach ($unit as $key => $value) {
                    $pt[$key] = $value;
                }
                foreach ($ppt as $key => $value) {
                    $pt[$key] = $value;
                }
                $properties[] =$pt;
                
            }
            $myprop["Amenity"][] = $amenities;
            foreach ($amenities as $am) {
                array_push($amenityids, $am);
            }
            $myprop["PropertyType"] = $propertytypes;
            $myprop["PropertyPhoto"] = $propertyphotos;
            //$myprop["Units"] = $units;
            $myprop["Properties"] = $properties;
            $myprop["unitphotos"] = $unitphotos;
            //print_r(count($propertyphotos));
            // exit;

            if(count($properties)>0)
            {
                echo "Properties<br>";
                foreach ($properties as $proptry) {
                    //$finalProperties = $proptry['Properties'];
                    
                    $propModel = Properties::findOne(['propertyid'=>$proptry['propertyid'],'unitid'=>$proptry['unitid']]);
                    
                        //print_r($propModel);

                    if(!$propModel)
                    {
                        $propModel = new Properties();
                    }
                    foreach ($proptry as $key => $value) {
                        if(strtolower($key) == 'name')
                        {
                            $propModel['unitname'] = $value;
                        }
                        else
                            $propModel[strtolower($key)] = $value;
                    }
                    $propModel['isexists'] = 1;
                    $propModel['visibilitystatus'] = 1;
                    $propModel['availablitystatus'] = 1;
                    $propModel['approvalstatus'] = 1;
                    $propModel['usertype'] = 0;
                    if($propModel->save())
                        echo "Saved/updated Property<br>";
                    else
                        echo "erro prop==> ";print_r($propModel->getErrors());

                    //print_r($propModel);

                }
            }

            

            if(count($amenity)>0)
            {
                echo "Amenities<br>";
                foreach ($amenities as $amenity) {
                    $amenitiesModels = Amenities::findOne(['propertyid'=>$amenity['propertyid'],'amenityid'=>$amenity['amenityid']]);
                    if(!$amenitiesModels)
                        $amenitiesModels = new Amenities();
                    foreach ($amenity as $key => $value) {
                        $amenitiesModels[strtolower($key)] = $value;
                    }
                    $amenitiesModels['isexists'] = 1;
                    if($amenitiesModels->save())
                        echo "Saved/Updated Amenities<br>";
                    else
                    {
                        echo "erro am==> ";print_r($amenitiesModels->getErrors());
                    }
                }
            }
            

            if(count($propertytypes)>0)
            {
                echo "PropertTypes<br>";
                foreach ($propertytypes as $propertytype) {
                    $propertytypesModels = Propertytype::findOne(['propertyid'=>$propertytype['propertyid'],'type'=>$propertytype['type']]);
                    if(!$propertytypesModels)
                        $propertytypesModels = new Propertytype();
                    foreach ($propertytype as $key => $value) {
                        $propertytypesModels[strtolower($key)] = $value;
                    }
                    $propertytypesModels['isexists'] = 1;
                    if($propertytypesModels->save())
                        echo "Saved/Updated property type<br>";
                    else
                    {
                        echo "erro pt==> ";print_r($propertytypesModels->getErrors());
                    }
                    //print_r($propertytypesModels);
                }
            }
            

            if(count($propertyphotos)>0)
            {
                echo "PropertyPhotos<br>";
                foreach ($propertyphotos as $propertyphoto) {
                    //print_r($propertyphoto);
                        $propertyphotosModels = Propertyphoto::findOne(['propertyid'=>$propertyphoto['propertyid'],'imageurl'=>$propertyphoto['ImageUrl']]);
                        if(!$propertyphotosModels)
                            $propertyphotosModels = new Propertyphoto();
                        foreach ($propertyphoto as $key => $value) {
                            $propertyphotosModels['isprimary'] = 0;
                            if(strtolower($key) == 'primary')
                                $propertyphotosModels['isprimary'] = 1;
                            else if(strtolower($key)=="modificationdate")
                            {
                                $propertyphotosModels[strtolower($key)] = date("Y-m-d H:i:s",\DateTime::createFromFormat('Y-m-dtH:i:s.tz', $value));
                            }
                            else
                                $propertyphotosModels[strtolower($key)] = $value;
                        }
                        $propertyphotosModels['isexists'] = 1;
                        try{
                            if($propertyphotosModels->save())
                                echo "Saved/Updated Property Photo<br>";
                            else
                            {
                                print_r($propertyphotosModels->getErrors());
                            }
                        }
                        catch(yii\db\Exception $e)
                        {
                            echo $e->getMessage();
                        }
                        //print_r($propertyphotosModels);
                }
            }

            if(count($unitphotos)>0)
            {
                echo "unit photos<br>";
                foreach ($unitphotos as $unitphoto) {
                    $unitphotosModels = Unitphoto::findOne(['propertyid'=>$unitphoto['propertyid'],'imageurl'=>$unitphoto['imageurl']]);
                    if(!$unitphotosModels)
                        $unitphotosModels = new Unitphoto();
                    foreach ($unitphoto as $key => $value) {
                        $unitphotosModels['isprimary'] = 0;
                        if($key == 'primary')
                            $unitphotosModels['isprimary'] = 1;
                        else if(strtolower($key)=="modificationdate")
                            {
                                $unitphotosModels[strtolower($key)] = date("Y-m-d H:i:s",\DateTime::createFromFormat('Y-m-dtH:i:s.tz', $value));
                            }
                        else
                            $unitphotosModels[strtolower($key)] = $value;
                        
                    }
                    $unitphotosModels['isexists'] = 1;
                    if($unitphotosModels->save())
                        echo "Saved/Updated Unit Photo<br>";
                    else
                    {
                        echo "erro unitph==> ";print_r($unitphotosModels->getErrors());
                    }
                    //print_r($unitphotosModels);
                }
            }
        }
        $this->deleteProperties();
        //$this->deletePropertyAmenities();
    }

    public function actionFetchUpdateDataOld()
    {
        //$url = 'http://877rentpro.rentlinx.com/data.xml';
        $url = 'http://localhost/mbproperty/backend/web/data.xml';
        $xmldata = file_get_contents($url);
        $sl = str_replace("r:", "", $xmldata);
        $xml = simplexml_load_string($sl);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //echo "<pre>";
        foreach ($array['Properties']['Property'][0]['Amenity'] as $amenity) {
            echo $amenity['@attributes']['AmenityID']."<br>";
        }

        foreach ($array['Properties']['Property'][0]['Amenity'] as $amenity) {
            echo $amenity['@attributes']['AmenityID']."<br>";
        }

        exit;
        $this->updateProperties();
        $propertyids=[];
        foreach ($xml as $key) {
            foreach ($key->children() as $property){

                echo "----------------- Property Start   ---------------<br/>";
                //print_r($property->Unit);
                
                foreach ($property->attributes() as $key => $value) {
                    if($key == 'LocalPropertyID')
                    {
                        $propertyid = (string) $value;
                        $propertyids[] = $propertyid;
                    }

                }

                $description = "";
                $address = "";
                $city = "";
                $state = "";
                $zip = "";
                $zip4 = "";
                $yearbuilt = "";
                $numberunits = "";
                $latitude = "";
                $longitude = "";
                $waitlist = "";
                $nofee = "";
                $unittype = "";
                $unitname = "";
                $isopentolease = "";
                $rentisbasedonincome = "";
                $minrent = "";
                $maxrent = "";
                $mindeposit = "";
                $maxdeposit = "";
                $bedrooms = "";
                $fullbaths = "";
                $halfbaths = "";
                $minsquarefeet = "";
                $maxsquarefeet = "";
                $ismobilityaccessible = "";
                $isvisionaccessible = "";
                $ishearingaccessible = "";
                $unitdescription = "";
                $unitid = "";
                
                foreach($property->children() as $prop){

                    $p[strtolower($prop->getName())] = (string) $prop;
                    if(strtolower($prop->getName()) == "description")
                    {
                        $description = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "address")
                    {
                        $address = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "city")
                    {
                        $city = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "state")
                    {
                        $state = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "zip")
                    {
                        $zip = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "zip4")
                    {
                        $zip4 = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "yearbuilt")
                    {
                        $yearbuilt = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "numberunits")
                    {
                        $numberunits = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "latitude")
                    {
                        $latitude = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "longitude")
                    {
                        $longitude = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "waitlist")
                    {
                        $waitlist = (string) $prop;
                    }
                    else if(strtolower($prop->getName()) == "nofee")
                    {
                        $nofee = (string) $prop;
                    }
                    
                    if($prop->getName() == "Unit")
                    {
                        //echo "----------------- Unit ---------------<br/>";
                        foreach ($prop->attributes() as $key => $value) {
                            if($key == 'LocalUnitID')
                                $unitid = (string) $value;
                        }
                                //$unitid = (string) $prop;

                        foreach ($prop->children() as $unit) {
                            if(strtolower($unit->getName()) == "unittype")
                            {
                                $unittype = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "name")
                            {
                                $unitname = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "description")
                            {
                                $description = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "isopentolease")
                            {
                                $isopentolease = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "rentisbasedonincome")
                            {
                                $rentisbasedonincome = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "minrent")
                            {
                                $minrent = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "maxrent")
                            {
                                $maxrent = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "mindeposit")
                            {
                                $mindeposit = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "maxdeposit")
                            {
                                $maxdeposit = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "bedrooms")
                            {
                                $bedrooms = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "fullbaths")
                            {
                                $fullbaths = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "halfbaths")
                            {
                                $halfbaths = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "minsquarefeet")
                            {
                                $minsquarefeet = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "maxsquarefeet")
                            {
                                $maxsquarefeet = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "ismobilityaccessible")
                            {
                                $ismobilityaccessible = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "isvisionaccessible")
                            {
                                $isvisionaccessible = (string) $unit;
                            }
                            else if(strtolower($unit->getName()) == "ishearingaccessible")
                            {
                                $ishearingaccessible = (string) $unit;
                            }
                            //echo $unit->getName()." => ".$unit."<br/>";
                        }
                    }

                    

                    /*if($prop->getName() != "Amenity" && $prop->getName() !="PropertyPhoto" && $prop->getName() !="Unit")
                    {
                        echo strtolower($prop->getName()).":".$prop."<br/>";
                    }
                    else if($prop->getName() == "Amenity" || $prop->getName() == "PropertyPhoto")
                    {
                        echo "----------------- ".$prop->getName()." ---------------<br/>";
                        foreach ($prop->attributes() as $key => $value) {
                            echo $key." => ".$value."<br/>";
                        }
                    }
                    else if($prop->getName() == "Unit")
                    {
                        echo "----------------- Unit ---------------<br/>";
                        foreach ($prop->children() as $unit) {
                            echo $unit->getName()." => ".$unit."<br/>";
                        }
                    }*/
                }
                $propModel = Properties::findOne(['propertyid'=>$propertyid]);
                if($propModel)
                {

                    $propModel->description = $description;
                    $propModel->address = $address;
                    $propModel->city = $city;
                    $propModel->state = $state;
                    $propModel->zip = $zip;
                    $propModel->zip4 = $zip4;
                    $propModel->yearbuilt = $yearbuilt;
                    $propModel->numberunits = $numberunits;
                    $propModel->latitude = $latitude;
                    $propModel->longitude = $longitude;
                    $propModel->waitlist = $waitlist;
                    $propModel->nofee = $nofee;
                    $propModel->unittype = $unittype;
                    $propModel->unitname = $unitname;
                    $propModel->isopentolease = $isopentolease;
                    $propModel->rentisbasedonincome = $rentisbasedonincome;
                    $propModel->minrent = $minrent;
                    $propModel->maxrent = $maxrent;
                    $propModel->mindeposit = $mindeposit;
                    $propModel->maxdeposit = $maxdeposit;
                    $propModel->bedrooms = $bedrooms;
                    $propModel->fullbaths = $fullbaths;
                    $propModel->halfbaths = $halfbaths;
                    $propModel->minsquarefeet = $minsquarefeet;
                    $propModel->maxsquarefeet = $maxsquarefeet;
                    $propModel->ismobilityaccessible = $ismobilityaccessible;
                    $propModel->isvisionaccessible = $isvisionaccessible;
                    $propModel->ishearingaccessible = $ishearingaccessible;
                    $propModel->unitdescription = $unitdescription;
                    $propModel->unitid = $unitid;
                    $propModel->isexists = 1;
                    $propModel->usertype = 0;
                    if($propModel->save())
                        echo "Update ".$propModel->propertyid."<br/>";
                }
                else
                {

                    $propModel = new Properties();
                    $propModel->propertyid = $propertyid;
                    $propModel->description = $description;
                    $propModel->address = $address;
                    $propModel->city = $city;
                    $propModel->state = $state;
                    $propModel->zip = $zip;
                    $propModel->zip4 = $zip4;
                    $propModel->yearbuilt = $yearbuilt;
                    $propModel->numberunits = $numberunits;
                    $propModel->latitude = $latitude;
                    $propModel->longitude = $longitude;
                    $propModel->waitlist = $waitlist;
                    $propModel->nofee = $nofee;
                    $propModel->unittype = $unittype;
                    $propModel->unitname = $unitname;
                    $propModel->isopentolease = $isopentolease;
                    $propModel->rentisbasedonincome = $rentisbasedonincome;
                    $propModel->minrent = $minrent;
                    $propModel->maxrent = $maxrent;
                    $propModel->mindeposit = $mindeposit;
                    $propModel->maxdeposit = $maxdeposit;
                    $propModel->bedrooms = $bedrooms;
                    $propModel->fullbaths = $fullbaths;
                    $propModel->halfbaths = $halfbaths;
                    $propModel->minsquarefeet = $minsquarefeet;
                    $propModel->maxsquarefeet = $maxsquarefeet;
                    $propModel->ismobilityaccessible = $ismobilityaccessible;
                    $propModel->isvisionaccessible = $isvisionaccessible;
                    $propModel->ishearingaccessible = $ishearingaccessible;
                    $propModel->unitdescription = $unitdescription;
                    $propModel->unitid = $unitid;
                    $propModel->isexists = 1;
                    $propModel->usertype = 0;
                    if($propModel->save())
                        echo "insert ".$propModel->propertyid."<br/>";
                    else
                        echo "<pre>"; print_r($propModel->getErrors());exit;
                }
                
                //print_r($propModel);
                //echo "----------------- Property End ---------------<br/>";
            }
            $this->deleteProperties();
        }

        
    }

    public function updateProperties()
    {
        $propertyModel = Properties::updateAll(['isexists' => 0], 'usertype=0');
        $AmenityModel = Amenities::updateAll(['isexists' => 0]);
        $PropertyphotoModel = Propertyphoto::updateAll(['isexists'=>0]);
        $PropertytypeModel = Propertytype::updateAll(['isexists'=>0]);
        $UnitphotoModel = Unitphoto::updateAll(['isexists'=>0]);
    }
    public function deleteProperties()
    {
        $propertyModel = Properties::deleteAll(["isexists"=>0,"usertype"=>0]);
        $AmenityModel = Amenities::deleteAll(['isexists'=>0]);
        $PropertyphotoModel = Propertyphoto::deleteAll(['isexists'=>0]);
        $PropertytypeModel = Propertytype::deleteAll(['isexists'=>0]);
        $UnitphotoModel = Unitphoto::deleteAll(['isexists'=>0]);
    }
}
