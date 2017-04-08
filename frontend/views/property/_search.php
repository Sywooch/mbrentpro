<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PropertiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="properties-search">

    <?php $form = ActiveForm::begin([
        "id"=>"searchfilterproperty",
        'action' => ['ajax-index'],
        'method' => 'get',
    ]); ?>

    <?php
    ?>

    <div class="col-md-3 col-sm-4 col-xs-12 bg-filer  borderradius border">
                <div class="row ">
                    <h1 class="font18 padding20 margin-none border-bottom">
                        <b class="blue-txt"> Refine search</b> <a class="font12p text-uppercase black-txt pull-right padding5" href="<?= \yii\helpers\Url::to(['property/index']);?>"> Clear All</a>
                        </h1>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom20">
                        <h3 class="font16 margin-none paddingtb15">  <b class="blue-txt">Price </b> </h3>
                        <p>

                            <input type="text" id="amount" class="blue-txt" readonly="" style="border:0; font-weight:bold;background: none;">
                        </p>

                        <div id="slider-range"></div>
                    </div>


                </div>

                <div class="row  paddingtb15">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php echo $form->field($model, 'bedrooms')->dropDownList([1,2,3],['prompt'=>"Select Bedrooms","class"=>"select padding10 borderradius5"])->label(false); ?>
                        <!-- <select class="select padding10 borderradius5">
                            <option>
                                Select Bedrooms
                            </option>

                            <option>
                                1
                            </option>

                        </select> -->
                    </div>

                </div>

                <div class="row  paddingtb15">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php echo $form->field($model, 'fullbaths')->dropDownList([1,2,3],['prompt'=>"Select Bathrooms","class"=>"select padding10 borderradius5"])->label(false); ?>
                        <!-- <select class="select padding10 borderradius5">
                            <option>
                                Select Bathrooms
                            </option>

                            <option>
                                1
                            </option>

                        </select> -->
                    </div>

                </div>


                <div class="row  paddingtb15">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select class="select padding10 borderradius5">
                            <option>
                                Pets
                            </option>

                            <option>
                                1
                            </option>

                        </select>
                    </div>

                </div>

                <div class="row  paddingtb15">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select class="select padding10 borderradius5">
                            <option>
                                Photos
                            </option>

                            <option>
                                1
                            </option>

                        </select>
                    </div>

                </div>

                <div class="row ">


                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h3 class="font16 margin-none paddingtb15">  <b class="blue-txt">Property Type </b> </h3>
                        <div class="checkbox">
                            <label class="control control--checkbox padding-left30 font16"> Apartments
                                <input type="checkbox" checked="checked">
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="control control--checkbox padding-left30 font16">House
                                <input type="checkbox">
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="control control--checkbox padding-left30 font16">Condo
                                <input type="checkbox">
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="control control--checkbox padding-left30 font16">Flat
                                <input type="checkbox">
                                <div class="control__indicator"></div>
                            </label>
                        </div>

                    </div>


                </div>

                <div class="row ">


                    <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom20">
                        <h3 class="font16 margin-none paddingtb15">  <b class="blue-txt">Sqft</b> </h3>
                        <p>

                            <input type="text" id="amountsqft" class="blue-txt" readonly="" style="border:0; font-weight:bold;     background: none;">
                        </p>

                        <div id="sqft"></div>
                    </div>


                </div>
            </div>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'propertyid') ?>

    <?php // $form->field($model, 'description') ?>

    <?php // $form->field($model, 'address') ?>

    <?php // $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'zip') ?>

    <?php // echo $form->field($model, 'zip4') ?>

    <?php // echo $form->field($model, 'yearbuilt') ?>

    <?php // echo $form->field($model, 'numberunits') ?>

    <?php echo $form->field($model, 'latitude')->hiddenInput()->label(false);  ?>

    <?php echo $form->field($model, 'longitude')->hiddenInput()->label(false);  ?>

    <?php // echo $form->field($model, 'waitlist') ?>

    <?php // echo $form->field($model, 'nofee') ?>

    <?php // echo $form->field($model, 'unitid') ?>

    <?php // echo $form->field($model, 'unittype') ?>

    <?php // echo $form->field($model, 'unitname') ?>

    <?php // echo $form->field($model, 'unitdescription') ?>

    <?php // echo $form->field($model, 'isopentolease') ?>

    <?php // echo $form->field($model, 'rentisbasedonincome') ?>

    <?php  echo $form->field($model, 'minrent')->hiddenInput()->label(false); ?>

    <?php  echo $form->field($model, 'maxrent')->hiddenInput()->label(false); ?>

    <?php // echo $form->field($model, 'mindeposit') ?>

    <?php // echo $form->field($model, 'maxdeposit') ?>

    

    <?php // echo $form->field($model, 'fullbaths') ?>

    <?php echo $form->field($model, 'halfbaths')->hiddenInput()->label(false); ?>

    <?php echo $form->field($model, 'minsquarefeet')->hiddenInput()->label(false); ?>

    <?php echo $form->field($model, 'maxsquarefeet')->hiddenInput()->label(false); ?>

    <?php // echo $form->field($model, 'ismobilityaccessible') ?>

    <?php // echo $form->field($model, 'isvisionaccessible') ?>

    <?php // echo $form->field($model, 'ishearingaccessible') ?>

    <?php // echo $form->field($model, 'isexists') ?>

    <?php // echo $form->field($model, 'availabledate') ?>

    <?php // echo $form->field($model, 'leaseperiod') ?>

    <?php // echo $form->field($model, 'contactid') ?>

    <?php //echo $form->field($model, 'availablitystatus')->hiddenInput(['value'=>1])->label(false); ?>

    <?php //echo $form->field($model, 'approvalstatus')->hiddenInput(['value'=>1])->label(false); ?>

    <?php // echo $form->field($model, 'rejectreason') ?>

    <?php // echo $form->field($model, 'dogs') ?>

    <?php // echo $form->field($model, 'cats') ?>

    <?php // echo $form->field($model, 'furnished') ?>

    <?php // echo $form->field($model, 'elevator') ?>

    <?php // echo $form->field($model, 'pool') ?>

    <?php // echo $form->field($model, 'wheelchair_access') ?>

    <?php // echo $form->field($model, 'laundry_type') ?>

    <?php // echo $form->field($model, 'parking_type') ?>

    <?php // echo $form->field($model, 'parkingfee') ?>

    <?php // echo $form->field($model, 'youtube_url') ?>

    <?php // echo $form->field($model, 'visibilitystatus') ?>

    <?php // echo $form->field($model, 'usertype') ?>

    <div class="form-group">
        <?php // echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
