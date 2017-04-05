<?php use common\models\Amenities; ?>
<div class="container-fluid grey  padding20">
        <div class="container">
            <div class="swiper-container1 swiper-container-horizontal">

                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide-active" style="width: 930px;">
                        <img src="images/inside-banner.png">

                    </div>
                    <div class="swiper-slide swiper-slide-next" style="width: 930px;"> <img src="images/inside-banner.png"></div>
                    <div class="swiper-slide" style="width: 930px;"> <img src="images/inside-banner.png"></div>

                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>


            </div>
        </div>
</div>
<div class="container paddingtb20">

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-10 col-sm-10">
                    <h3 class="light-blue"> <?=$model->address?></h3>
                    <div><?=$model->city?></div>
                    <span><?=$model->state?></span>
                </div>
                <div class="col-md-2 col-sm-2">
                    <h3 class="light-blue"><b> $<?=$model->minrent?></b></h3>
                    <span> Per month </span>
                </div>

            </div>
            <div class="row aos-item aos-init aos-animate" data-aos="fade-right">
                <div class="col-md-12">
                    <h3 class="font16 padding-bottom20"><b>Overview </b> </h3>
                </div>
            </div>
            <div class="row padding-bottom20 aos-item aos-init aos-animate" data-aos="fade-right">
                <div class="col-md-3 col-sm-3 col-xs-12 ">
                    <div>
                        <object type="image/svg+xml" data="images/apartment.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-2">15 Years
                            <br>Age of property </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div>
                        <object type="image/svg+xml" data="images/sleepy.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-2"><?=$model->bedrooms?>
                            <br>Bedrooms </div>
                    </div>


                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div>
                        <object type="image/svg+xml" data="images/hygienic.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-2"><?=$model->fullbaths?>
                            <br>Bathrooms </div>
                    </div>


                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div>
                        <object type="image/svg+xml" data="images/dog.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-sm-offset-3 col-xs-offset-2">Yes
                            <br> Pets Allowed </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p> <?=$model->description?>. </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="font16 padding-bottom20"> <b> Amenities</b></h3>
                </div>
            </div>
            <div class="row padding-bottom10 aos-item aos-init aos-animate" data-aos="fade-right">
                <?php
                $modelam = Amenities::find()->where(['propertyid'=>$model->propertyid])->all();
                //echo count($modelam);exit;
                foreach ($modelam as $modelams) {
                echo '<div class="col-md-4 col-sm-4 col-xs-12  ">';
                    echo '<div class="padding-bottom20">';
                        echo '<object type="image/svg+xml" data="images/dog.svg" width="24px" height="24px" class="pull-left">';

                        echo '</object>';
                        echo '<div class="col-md-offset-3 col-xs-offset-2">'.$modelams->amenityid.'</div>';
                    echo '</div>';
                echo '</div>';
                }
                
                ?>
                <!-- <div class="col-md-4 col-sm-4 col-xs-12  ">
                    <div class="padding-bottom20">
                        <object type="image/svg+xml" data="images/dog.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-xs-offset-2">
                            Pet Friendly</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12  ">
                    <div class="padding-bottom20">
                        <object type="image/svg+xml" data="images/washing-machine.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-xs-offset-2">
                            Washer / Dryer </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <div class="padding-bottom20">
                        <object type="image/svg+xml" data="images/elevator.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-xs-offset-2">
                            Elevator </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12  ">
                    <div class="padding-bottom20">
                        <object type="image/svg+xml" data="images/car-parking.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-xs-offset-2">
                            Parking </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12  ">
                    <div class="padding-bottom20">
                        <object type="image/svg+xml" data="images/dishwasher.svg" width="24px" height="24px" class="pull-left">

                        </object>
                        <div class="col-md-offset-3 col-xs-offset-2">
                            Dishwasher </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="font16 padding-bottom20"><b> Location</b></h3>

                </div>
            </div>

        </div>



        <div class="col-md-3 mdgrey white-txt borderradius5 aos-item aos-init aos-animate" data-aos="fade-up">
            <div class="wrapper padding-bottom10  ">
                <div class="row borderb">

                    <div class="text-center paddingtb20 "> Owner</div>
                    <div class="text-center white-txt">
                        <object type="image/svg+xml" data="images/user.svg" width="42px" height="42px">

                        </object>
                    </div>
                    <div class="text-center padding10 "> John Smith</div>


                </div>
                <div class="row padding10">
                    <div class="text-center paddingtb20 ">
                        Contact : 78787-65655
                    </div>
                    <div class="text-center paddingtb10 ">
                        Email : <a href="" class="white-txt"> john.smith@fmail.com</a>
                    </div>

                </div>
                <button type="button" class="btn btn-primary btn-lg btn-block margin-bottom20 yellow black-txt bordernone ">Add to Shortlist</button>
            </div>
        </div>
    </div>