<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Propertyphoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertyphoto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'propertyid')->textInput() ?>

    <?= $form->field($model, 'imageurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modificationdate')->textInput() ?>

    <?= $form->field($model, 'isprimary')->textInput() ?>

    <?= $form->field($model, 'isexists')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
