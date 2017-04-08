<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PropertyphotoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertyphoto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'propertyid') ?>

    <?= $form->field($model, 'imageurl') ?>

    <?= $form->field($model, 'modificationdate') ?>

    <?= $form->field($model, 'isprimary') ?>

    <?php // echo $form->field($model, 'isexists') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
