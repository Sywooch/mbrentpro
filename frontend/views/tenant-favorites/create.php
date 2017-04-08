<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TenantFavorites */

$this->title = 'Create Tenant Favorites';
$this->params['breadcrumbs'][] = ['label' => 'Tenant Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-favorites-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
