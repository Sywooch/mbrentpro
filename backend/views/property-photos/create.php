<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Propertyphoto */

$this->title = 'Create Propertyphoto';
$this->params['breadcrumbs'][] = ['label' => 'Propertyphotos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propertyphoto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
