<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Properties */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="properties-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
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
            'unittype',
            'unitname',
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
            'unitdescription:ntext',
            'unitid',
            'isexists',
        ],
    ]) ?>

</div>
