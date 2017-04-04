<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PropertiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="properties-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'propertyid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'zip') ?>

    <?php // echo $form->field($model, 'zip4') ?>

    <?php // echo $form->field($model, 'yearbuilt') ?>

    <?php // echo $form->field($model, 'numberunits') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'waitlist') ?>

    <?php // echo $form->field($model, 'nofee') ?>

    <?php // echo $form->field($model, 'unittype') ?>

    <?php // echo $form->field($model, 'unitname') ?>

    <?php // echo $form->field($model, 'isopentolease') ?>

    <?php // echo $form->field($model, 'rentisbasedonincome') ?>

    <?php // echo $form->field($model, 'minrent') ?>

    <?php // echo $form->field($model, 'maxrent') ?>

    <?php // echo $form->field($model, 'mindeposit') ?>

    <?php // echo $form->field($model, 'maxdeposit') ?>

    <?php // echo $form->field($model, 'bedrooms') ?>

    <?php // echo $form->field($model, 'fullbaths') ?>

    <?php // echo $form->field($model, 'halfbaths') ?>

    <?php // echo $form->field($model, 'minsquarefeet') ?>

    <?php // echo $form->field($model, 'maxsquarefeet') ?>

    <?php // echo $form->field($model, 'ismobilityaccessible') ?>

    <?php // echo $form->field($model, 'isvisionaccessible') ?>

    <?php // echo $form->field($model, 'ishearingaccessible') ?>

    <?php // echo $form->field($model, 'unitdescription') ?>

    <?php // echo $form->field($model, 'unitid') ?>

    <?php // echo $form->field($model, 'isexists') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
