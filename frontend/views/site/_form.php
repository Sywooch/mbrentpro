<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\States;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\TenantUsers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-users-form">

    <?php $form = ActiveForm::begin(); 
//print_r($model->getErrors());
    ?>

<div class="row ">
    <h3 class="font18 padding20 margin-top0"> <b> General Account information </b>  </h3>
        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'Email']) ?>
            
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true,'placeholder'=>'Firstname']) ?>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true,'placeholder'=>'Lastname']) ?>
        </div>
</div>

    <div class="row ">
        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?php
$states = States::find()->all();
$statesdata = ArrayHelper::map($states, "id", "title");
?>
    <?= $form->field($model, 'stateid')->dropDownList($statesdata,['prompt'=>'Select State']); ?>

        <?php // $form->field($model, 'stateid')->textInput() ?>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?php // $form->field($model, 'cityid')->textInput() ?>

        <?php
//$states = States::find()->all();
//$statesdata = ArrayHelper::map($states, "id", "title");
?>
    <?= $form->field($model, 'cityid')->dropDownList([],['prompt'=>'Select city']); ?>

        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">

        </div>
    </div>

    <div class="row ">
        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'dateofbirth')->textInput(['id'=>'datepicker','placeholder'=>'Birthday']) ?>
        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'gender')->radioList([ 'Male' => 'Male', 'Female' => 'Female', ], ["class"=>"rad", "item"=> function($index, $label, $name, $checked, $value){
            if(!$checked)
            return "<input name='".$name."' type='radio' id='rad_".$label."'  value='".$value."'   /><label for='rad_".$label."'  class='rad-label'>".$value."</label>";
        else
            return "<input name='".$name."' type='radio' id='rad_".$label."'  value='".$value."' checked/><label for='rad_".$label."'  class='rad-label'>".$value."</label>";
            }]); ?>
        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'marital_status')->radioList(['Single' => 'Single', 'Married' => 'Married', ], ['class' => 'rad', "item"=> function($index, $label, $name, $checked, $value){
            if(!$checked)
            return "<input name='".$name."' type='radio' id='rad_".$label."' value='".$value."'/><label for='rad_".$label."'  class='rad-label'>".$value."</label>";
        else
            return "<input name='".$name."' type='radio' id='rad_".$label."' value='".$value."' checked/><label for='rad_".$label."'  class='rad-label'>".$value."</label>";
            }]); ?>

        </div>
    </div>

    <div class="row ">
                <h3 class="font18 padding20 margin-top0"> <b> Personal information </b>  </h3>
        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'annual_income')->dropDownList(['1-10','11-20']) ?>
        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'no_of_children')->textInput(['placeholder'=>'No of children']) ?>

        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'mobileno')->textInput(['maxlength' => true,'placeholder'=>'Phone']) ?>
        
        </div>
    </div>

    <div class="row ">
        <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'user_type_id')->radioList([2=>'Landlord',3=>'Tenant' ], ["class"=>"rad", "item"=> function($index, $label, $name, $checked, $value){
            if(!$checked)

            return "<input name='".$name."' type='radio' id='rad_".$label."'  value='".$value."'/><label for='rad_".$label."'  class='rad-label'>".$label."</label>";
            else
            return "<input name='".$name."' type='radio' id='rad_".$label."'  value='".$value."' checked/><label for='rad_".$label."'  class='rad-label'>".$label."</label>";
            }]); ?>

        <?php //$form->field($model, 'user_type_id')->textInput() ?>
        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div><div class="col-md-4 col-sm-4 col-xs-12 margin-bottom20">
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-12 margin-top20 margin-bottom20">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning btn-lg btn-block black-txt' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
