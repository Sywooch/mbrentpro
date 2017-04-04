<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Propertiesnew */

$this->title = 'Create Propertiesnew';
$this->params['breadcrumbs'][] = ['label' => 'Propertiesnews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propertiesnew-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
