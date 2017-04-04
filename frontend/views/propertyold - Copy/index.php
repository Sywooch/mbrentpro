<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PropertiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Properties';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid blue  padding20">

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
    </div>

<div class="container-fluid grey">
        <div class="container paddingtb20">


            <div class="col-md-3 col-sm-3 col-xs-12 white-bg borderradius">
                <div class="row ">
                    <h1 class="font18 padding20 margin-none">
                        <b> Refine search</b>
                        </h1>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h3 class="font16 margin-none paddingtb15">  <b class="blue-txt">Price </b> </h3>

                    </div>


                </div>

                <div class="row  paddingtb15">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select class="select">
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
                        <select class="select">
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
                        <select class="select">
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
                        <select class="select">
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

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value=""> Apartments
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value=""> House
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value=""> Condo
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value=""> Flat
                            </label>
                        </div>
                    </div>


                </div>

                <div class="row ">


                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h3 class="font16 margin-none paddingtb15">  <b class="blue-txt">Sqft</b> </h3>

                    </div>


                </div>
            </div>



            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="row padding10">
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        Showing 6 out of 7 properties.
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <select class="select">
                            <option>
                                Sorty By
                            </option>

                            <option>
                                Date
                            </option>

                        </select>

                    </div>

                </div>
                <div class="col-md-4 col-sm-2 col-xs-12">
                    <div class="book-wrapper1">
                        <img src="images/house.jpg" class="full-width">
                        <div class="card-wrapper">
                            <div class="row width85 padding-bottom20" style=" margin: 0 auto;">
                                <h1 class="font16 blue-txt margin-bottom0">2260 S Barrington Ave</h1>
                                <span><b> Studios2</b> </span>
                                <p class="elipsis">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua

                                    <a href="#" style="display: block; color: #49b147;"> Read More </a>
                                </p>
                                <span class="fontbold font20 blue-txt">
                            $1,465
                            
                            </span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-2 col-xs-12">
                    <div class="book-wrapper1">
                        <img src="images/house.jpg" class="full-width">
                        <div class="card-wrapper">
                            <div class="row width85 padding-bottom20" style=" margin: 0 auto;">
                                <h1 class="font16 blue-txt margin-bottom0">2260 S Barrington Ave</h1>
                                <span><b> Studios2</b> </span>
                                <p class="elipsis">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua

                                    <a href="#" style="display: block; color: #49b147;"> Read More </a>
                                </p>
                                <span class="fontbold font20 blue-txt">
                            $1,465
                            
                            </span>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-2 col-xs-12">
                    <div class="book-wrapper1">
                        <img src="images/house.jpg" class="full-width">
                        <div class="card-wrapper">
                            <div class="row width85 padding-bottom20" style=" margin: 0 auto;">
                                <h1 class="font16 blue-txt margin-bottom0">2260 S Barrington Ave</h1>
                                <span><b> Studios2</b> </span>
                                <p class="elipsis">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua

                                    <a href="#" style="display: block; color: #49b147;"> Read More </a>
                                </p>
                                <span class="fontbold font20 blue-txt">
                            $1,465
                            
                            </span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 margin-top20">
                    <button type="button" class="btn btn-default btn-lg btn-block">Load more</button>


                </div>

            </div>
        </div>
    </div>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Properties', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?>
<?php Pjax::end(); ?>