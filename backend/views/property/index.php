<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PropertiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">

    <!-- <h3 class="light-blue  padding-bottom20" style="margin-bottom: 0px;"><?= Html::encode($this->title) ?></h3>
     --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Properties', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Own Properties', Url::toRoute(['property/index',"PropertiesSearch[usertype]"=>1]), ['class' => 'btn btn-success']) ?>
        <?= Html::a('Approved Properties', Url::toRoute(['property/index',"PropertiesSearch[approvalstatus]"=>1]), ['class' => 'btn btn-success']) ?>
        <?= Html::a('Rejected Properties', Url::toRoute(['property/index',"PropertiesSearch[approvalstatus]"=>0]), ['class' => 'btn btn-success']) ?>
        <?= Html::a('Pending Properties', Url::toRoute(['property/index',"PropertiesSearch[approvalstatus]"=>0]), ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        "summary"=>"",
        "options" => ["class"=>""],
        "tableOptions" => ["class"=>"table"],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'propertyid',
            'description:ntext',
            'address',
            'city',
            // 'state',
            // 'zip',
            // 'zip4',
            // 'yearbuilt',
            // 'numberunits',
            // 'latitude',
            // 'longitude',
            // 'waitlist',
            // 'nofee',
            // 'unitid',
            // 'unittype',
            // 'unitname',
            // 'unitdescription:ntext',
            // 'isopentolease',
            // 'rentisbasedonincome',
            // 'minrent',
            // 'maxrent',
            // 'mindeposit',
            // 'maxdeposit',
            // 'bedrooms',
            // 'fullbaths',
            // 'halfbaths',
            // 'minsquarefeet',
            // 'maxsquarefeet',
            // 'ismobilityaccessible',
            // 'isvisionaccessible',
            // 'ishearingaccessible',
            // 'isexists',
            // 'availabledate',
            // 'leaseperiod',
            // 'contactid',
            // 'availablitystatus',
            // 'approvalstatus',
            // 'rejectreason:ntext',
            // 'dogs',
            // 'cats',
            // 'furnished',
            // 'elevator',
            // 'pool',
            // 'wheelchair_access',
            // 'laundry_type',
            // 'parking_type',
            // 'parkingfee',
            // 'youtube_url:url',
            // 'visibilitystatus',
            // 'usertype',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>