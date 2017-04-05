<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Propertiesnew */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Propertiesnews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render("detail_item_view",['model'=>$model]);?>
    <?php  DetailView::widget([
        'model' => $model,
        //'viewPath' => 'detail_item_view',
        'attributes' => [
            'id',
            'propertyid',
            'description:ntext',
            'address',
            'city',
            'state',
            'zip',
            'zip4',
            'yearbuilt',
            'numberunits',
            'latitude',
            'longitude',
            'waitlist',
            'nofee',
            'unitid',
            'unittype',
            'unitname',
            'unitdescription:ntext',
            'isopentolease',
            'rentisbasedonincome',
            'minrent',
            'maxrent',
            'mindeposit',
            'maxdeposit',
            'bedrooms',
            'fullbaths',
            'halfbaths',
            'minsquarefeet',
            'maxsquarefeet',
            'ismobilityaccessible',
            'isvisionaccessible',
            'ishearingaccessible',
            'isexists',
            'availabledate',
            'leaseperiod',
            'contactid',
            'availablitystatus',
            'approvalstatus',
            'rejectreason:ntext',
            'dogs',
            'cats',
            'furnished',
            'elevator',
            'pool',
            'wheelchair_access',
            'laundry_type',
            'parking_type',
            'parkingfee',
            'youtube_url:url',
            'visibilitystatus',
            'usertype',
        ],
    ]) ?>