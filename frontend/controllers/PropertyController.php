<?php

namespace frontend\controllers;

use Yii;
use common\models\Properties;
use common\models\PropertiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * PropertynewController implements the CRUD actions for Properties model.
 */
class PropertyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Properties models.
     * @return mixed
     */
    public function actionIndex()
    {
        //echo $this->distance(17.670298,75.915255,17.6701965,75.9155166,"K"); exit;
        $searchModel = new PropertiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $newarr = [];
        foreach ($dataProvider->getModels() as $model) {
            //if($this->distance(17.670298,75.915255,17.6701965,75.9155166,"K")<3)
            //echo "Distance in KM: ".$this->distance($model->latitude,$model->longitude,17.6701965,75.9155166,"K")."<br>";
            if($this->distance($model->latitude,$model->longitude,17.6701965,75.9155166,"K") < 15000)
            {
                $newarr[]=$model;
                //echo $this->distance($model->latitude,$model->longitude,17.6701965,75.9155166,"K")."<br>";
            }
        }
        $provider = new ArrayDataProvider([
            'allModels' => $newarr,
            /*'sort' => [
                'attributes' => ['id', 'username', 'email'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],*/
        ]);
        //echo "<pre>"; print_r($newarr);exit;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionAjaxIndex()
    {
        $request = Yii::$app->request;
        if ($request->isAjax)
        {
            //echo "<pre>"; print_r(Yii::$app->request->queryParams);exit;
            $searchModel = new PropertiesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //echo "<pre>"; print_r($dataProvider);exit;

            /*$newarr = [];
            foreach ($dataProvider->getModels() as $model) {
                if($this->distance($model->latitude,$model->longitude,17.6701965,75.9155166,"K") < 15000)
                {
                    $newarr[]=$model;
                    //echo $this->distance($model->latitude,$model->longitude,17.6701965,75.9155166,"K")."<br>";
                }
            }*/
            //$provider = new ArrayDataProvider([
                //'allModels' => $newarr,
                /*'sort' => [
                    'attributes' => ['id', 'username', 'email'],
                ],
                'pagination' => [
                    'pageSize' => 10,
                ],*/
            //]);
            //echo "<pre>"; print_r($dataProvider);exit;
            return $this->renderPartial('ajax-index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Properties model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
          return ($miles * 0.8684);
        } 
        else {
            return $miles;
        }
    }

    /**
     * Creates a new Properties model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Properties();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Properties model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Properties model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Properties model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Properties the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Properties::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
