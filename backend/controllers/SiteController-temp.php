<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Properties;

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
                        'actions' => ['login', 'error','fetch-update-data'],
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

    public function actionFetchUpdateData()
    {
        //$url = 'http://877rentpro.rentlinx.com/data.xml';
        $url = 'http://localhost/mbproperty/backend/web/data.xml';
        $xmldata = file_get_contents($url);
        $sl = str_replace("r:", "", $xmldata);
        $xml = simplexml_load_string($sl);
        //echo "<pre>";
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
                    if($propModel->save())
                        echo "insert ".$propModel->propertyid."<br/>";
                    else
                        echo "<pre>"; print_r($propModel->getErrors());exit;
                }
                
                //print_r($propModel);
                //echo "----------------- Property End ---------------<br/>";
            }
            $this->deleteProperties($propertyids);
        }

        
    }

    public function updateProperties()
    {
        $model = Properties::updateAll(['isexists' => 0]);
    }
    public function deleteProperties($propertyids)
    {
        $model = Properties::deleteAll(['not in','propertyid',$propertyids]);
    }
}
