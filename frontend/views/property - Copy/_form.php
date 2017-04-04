<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Propertiesnew */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertiesnew-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'propertyid')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yearbuilt')->textInput() ?>

    <?= $form->field($model, 'numberunits')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'waitlist')->textInput() ?>

    <?= $form->field($model, 'nofee')->textInput() ?>

    <?= $form->field($model, 'unitid')->textInput() ?>

    <?= $form->field($model, 'unittype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unitname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unitdescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isopentolease')->textInput() ?>

    <?= $form->field($model, 'rentisbasedonincome')->textInput() ?>

    <?= $form->field($model, 'minrent')->textInput() ?>

    <?= $form->field($model, 'maxrent')->textInput() ?>

    <?= $form->field($model, 'mindeposit')->textInput() ?>

    <?= $form->field($model, 'maxdeposit')->textInput() ?>

    <?= $form->field($model, 'bedrooms')->textInput() ?>

    <?= $form->field($model, 'fullbaths')->textInput() ?>

    <?= $form->field($model, 'halfbaths')->textInput() ?>

    <?= $form->field($model, 'minsquarefeet')->textInput() ?>

    <?= $form->field($model, 'maxsquarefeet')->textInput() ?>

    <?= $form->field($model, 'ismobilityaccessible')->textInput() ?>

    <?= $form->field($model, 'isvisionaccessible')->textInput() ?>

    <?= $form->field($model, 'ishearingaccessible')->textInput() ?>

    <?= $form->field($model, 'isexists')->textInput() ?>

    <?= $form->field($model, 'availabledate')->textInput() ?>

    <?= $form->field($model, 'leaseperiod')->textInput() ?>

    <?= $form->field($model, 'contactid')->textInput() ?>

    <?= $form->field($model, 'availablitystatus')->textInput() ?>

    <?= $form->field($model, 'approvalstatus')->textInput() ?>

    <?= $form->field($model, 'rejectreason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dogs')->textInput() ?>

    <?= $form->field($model, 'cats')->textInput() ?>

    <?= $form->field($model, 'furnished')->textInput() ?>

    <?= $form->field($model, 'elevator')->textInput() ?>

    <?= $form->field($model, 'pool')->textInput() ?>

    <?= $form->field($model, 'wheelchair_access')->textInput() ?>

    <?= $form->field($model, 'laundry_type')->textInput() ?>

    <?= $form->field($model, 'parking_type')->textInput() ?>

    <?= $form->field($model, 'parkingfee')->textInput() ?>

    <?= $form->field($model, 'youtube_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visibilitystatus')->textInput() ?>

    <?= $form->field($model, 'usertype')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
