<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\data\Pagination;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PropertiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<div class="container-fluid blue  padding20">

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h3 class="white-txt margin-none ">  Search By Location </h3>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="col-md-10 col-sm-10 padding0">
                        <div class="input-group full-width">

                            <input type="text" class="form-control full-width padding10 " placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 padding0">
                        <div class="btn-group zindex full-width ">
                            <button type="button" class="btn btn-block yellow  padding10 ">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

<div class="container-fluid blue  padding20">

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <h3 class="white-txt margin-top10 font18 ">  Search By Location </h3>


                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="col-md-10 col-sm-10 padding0 ">
                        <div class="input-group full-width">

                            <input type="text" id="search_text" class="form-control full-width  paddingtb20 " placeholder="location">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2 padding0">
                        <div class="btn-group zindex full-width ">
                            <button id="search_button" type="button" class="btn btn-block yellow  padding10 "><span class="glyphicon glyphicon-search"></span></button>

                        </div>
                    </div>



                </div>


            </div>





        </div>
    </div>
<div class="container-fluid grey">
        <div class="container paddingtb20">

        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="col-md-3 col-sm-4 col-xs-12 bg-filer  borderradius border">
                <div class="row ">
                    <h1 class="font18 padding20 margin-none border-bottom">
                        <b class="blue-txt"> Refine search</b> <a class="font12p text-uppercase black-txt pull-right padding5" href="#"> Clrea All</a>
                        </h1>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding-bottom20">
                        <h3 class="font16 margin-none paddingtb15">  <b class="blue-txt">Price </b> </h3>
                        <p>

                            <input type="text" id="amount" class="blue-txt" readonly="" style="border:0; font-weight:bold;     background: none;">
                        </p>

                        <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 17%; width: 50%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 17%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 67%;"></span></div>
                    </div>


                </div>

                <div class="row  paddingtb15">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select class="select padding10 borderradius5">
                            <option>
                                Select Bedrooms
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
                                Select Bathrooms
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

                        <div id="sqft" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 17%; width: 50%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 17%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 67%;"></span></div>




                    </div>


                </div>
            </div>



             <div class="col-md-9 col-sm-9 col-xs-12">
<?php Pjax::begin([
'enablePushState' => false,
'enableReplaceState' => false,
]); ?>
<?= ListView::widget([
        'pager' => ['class' => \kop\y2sp\ScrollPager::className(), 'enabledExtensions'=> Array( \kop\y2sp\ScrollPager::EXTENSION_TRIGGER, \kop\y2sp\ScrollPager::EXTENSION_SPINNER, \kop\y2sp\ScrollPager::EXTENSION_NONE_LEFT, \kop\y2sp\ScrollPager::EXTENSION_PAGING ),'triggerOffset'=>10],
        'dataProvider' => $dataProvider,
        'summary'=>'<div class="row padding10">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        Showing {begin}-{end} out of {totalCount} properties.
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <select class="select borderradius5 padding5">
                            <option>
                                Sorty By
                            </option>

                            <option>
                                Date
                            </option>

                        </select>

                    </div>

                </div>',
        //'summaryOptions' => [],
        //'itemOptions' => ['class' => 'item'],
        'itemOptions' => ['class' => 'item col-md-4 col-sm-2 col-xs-12 margin-bottom20', "data-aos"=>"fade-down", "data-aos-easing"=>"linear","data-aos-duration"=>"500"],
        'itemView' => function ($model, $key, $index, $widget) {
            $photoModel = $model->getOnePropertyPhoto($model->propertyid);
            /*if($photoModel)
            {
                $return = '<div class="book-wrapper1">
                        <img src="'.$photoModel->imageurl.'" class="full-width">
                        <div class="card-wrapper">
                            <div class="row width85 padding-bottom20" style=" margin: 0 auto;">
                                <h1 class="font16 blue-txt margin-bottom0">'.$model->address.'</h1>
                                <span><b> Studios2</b> </span>
                                <p class="elipsis">
                                    '.$model->description.'
                                    <a href="#" style="display: block; color: #49b147;"> Read More </a>
                                </p>
                                <span class="fontbold font20 blue-txt">$'.number_format($model->minrent).'</span>
                            </div>


                        </div>
                    </div>';
            }
            else*/
            $return = '<div class="book-wrapper1">
                        <img src="images/house.jpg" class="full-width">
                        <div class="card-wrapper">
                            <div class="row width85 padding-bottom20" style=" margin: 0 auto;">
                                <h1 class="font16 blue-txt margin-bottom0">'.$model->address.'</h1>
                                <span><b> Studios2</b> </span>
                                <p class="elipsis">
                                    '.$model->description.'
                                    <a href="#" style="display: block; color: #49b147;"> Read More </a>
                                </p>
                                <span class="fontbold font20 blue-txt">$'.number_format($model->minrent).'</span>
                            </div>


                        </div>
                    </div>';
            return $return;
        },
    ]);?>
    
    <?php
        // $pages = new Pagination([ 'pageSize' => 2 ,'totalCount'=>$dataProvider->getTotalCount()]);
        // echo LinkPager::widget([
        //     'pagination' => $pages,
        //     'nextPageLabel' => '<button type="button" class="btn btn-default btn-lg btn-block">Load more</button>',
        //     'nextPageCssClass'=>'load-more text-center',
        //     'prevPageCssClass'=>'pagination hidden',
        //     'options'=>['class'=>'col-md-12 col-sm-12 col-xs-12 margin-top20'],
        //     'maxButtonCount'=> 0,
        //         ]);
            ?>

<?php Pjax::end(); ?>
                

                <!-- <div class="col-md-12 col-sm-12 col-xs-12 margin-top20">
                    <button type="button" class="btn btn-default btn-lg btn-block">Load more</button>
                </div> -->

            </div>
        </div>
    </div>
    

    <!-- <p>
        <?php //Html::a('Create Properties', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
