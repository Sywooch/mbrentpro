<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TenantUsers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tenant Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-users-view">

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
            'firstname',
            'lastname',
            'stateid',
            'cityid',
            'dateofbirth',
            'marital_status',
            'gender',
            'annual_income',
            'no_of_children',
            'mobileno',
            'address',
            'email:email',
            'password',
            'user_type_id',
            'created',
            'updated',
        ],
    ]) ?>

</div>
