<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TenantUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tenant Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tenant Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?php /* ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ])*/ ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        "summary"=>"",
        "options" => ["class"=>""],
        "tableOptions" => ["class"=>"table"],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
            'address',
            'email',
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
<?php Pjax::end(); ?></div>
