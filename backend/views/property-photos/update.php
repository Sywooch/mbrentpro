<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Propertyphoto */

$this->title = 'Update Propertyphoto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Propertyphotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propertyphoto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
