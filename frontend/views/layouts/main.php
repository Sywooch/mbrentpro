<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable=no>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/swiper.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .swiper-container1 {
            width: 100%;
            height: 100%;
        }
        
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        
        .swiper-slide img {
            width: 100%;
        }
    </style>

    <?php $this->head() ?>
</head>
<body>
    <div class=" navbar-inverse nav-grey white-txt">
        <div class="container white-txt">
            <div class="col-xs-6 col-sm-6">
                <ul class="nav navbar-nav navbar-left ">
                    <li>
                        <a class="white-txt inline" href="#"> <i class="fa fa-facebook fa-lg"></i></a>
                    </li>
                    <li>
                        <a class="white-txt inline" href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    </li>
                    <li>
                        <a class="white-txt inline" href="#"><i class="fa fa-instagram fa-lg"></i></a>
                    </li>

                    <li>
                        <a class="white-txt inline" href="#"> <i class="fa fa-rss fa-lg"></i></a>
                    </li>
                </ul>

            </div>
            <div class="col-xs-6 col-sm-6">
                <ul class="nav navbar-nav pull-right " style="display:inline-flex;">
                    <li>
                        <?php
                        if(Yii::$app->user->isGuest)
                            echo '<a class="white-txt inline" href="'.Url::to(['/site/login']).'">Sign in </a>';
                        else
                        {
                            //echo "<pre>"; print_r(Yii::$app->user);exit;
                            echo Html::beginForm(['/site/logout'], 'post');
                            echo Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->firstname . ')',
                                ['class' => 'btn btn-link logout']
                            );
                            echo Html::endForm();
                        }
                        ?>
                    </li>

                    <li>
                    <?php
                        if(Yii::$app->user->isGuest)
                        echo '<a class="white-txt inline" href="'.Url::to(['/site/signup']).'">Sign Up</a>';
                    ?>
                    </li>

                </ul>

            </div>

        </div>
    </div>

    <nav id="navbar" class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                <ul class="nav navbar-nav">
                    <li class="navigationli">
                        <a class="padding0" href="#about">Home</a>
                    </li>
                    <li class="navigationli">
                        <a class="padding0" href="#about">About</a>
                    </li>
                    <li class="navigationli">
                        <a class="padding0" href="#services">Services</a>
                    </li>

                    <li>
                        <a href="#"> <img alt="Brand" src="images/logo.png"></a>

                    </li>


                    <li class="navigationli">
                        <a class="padding0" href="#portfolio">Why Us</a>
                    </li>
                    <li class="navigationli">
                        <a class="padding0" href="#contact">Privacy</a>
                    </li>
                    <li class="navigationli">
                        <a class="padding0" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php $this->beginBody() ?>
    
    <?= Alert::widget() ?>
    <?= $content ?>
    
    <footer class="footer dark-grey light-grey-txt">
        <div class="container padding-top40 padding-bottom40  ">
            <div class="col-xs-12 col-md-5 col-sm-4 aos-item aos-init aos-animate " data-aos="fade-up">
                <h3 class="font11 padding-bottom20 letter-spacing footerhead-txt">ABOUT RENTPRO</h3>
                <p class="font14">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

                </p>

            </div>

            <div class="col-xs-12 col-md-2 col-sm-4 aos-item aos-init aos-animate " data-aos="fade-up">
                <ul>
                    <li>
                        <a href="">
                About      
                </a>

                    </li>
                    <li>
                        <a href="">
                Contact      
      
                </a>

                    </li>

                    <li>
                        <a href="">
                Terms Of Service      
   
                </a>

                    </li>

                    <li>
                        <a href="">
                Privacy Policy   
   
                </a>

                    </li>


                </ul>


            </div>

            <div class="col-xs-12 col-md-5 col-sm-4 aos-item aos-init aos-animate " data-aos="fade-up">
                <h3 class="font11 padding-bottom20 letter-spacing footerhead-txt">SUBSCRIBE TO OUR NEWS</h3>
                <p class="font14">
                    A rover wearing a fuzzy suit doesn’t alarm the real penguins

                </p>

                <input type="text" class="form-control footer-dark bordernone paddingtb20" id="exampleInputAmount" placeholder="E-mail">
                <button type="submit" class="btn btn-primary  footer-subcribe">

                    <span class="glyphicon glyphicon-envelope"> </span>
                </button>



            </div>

        </div>

        <div class="container-fluid black">

            <div class="container text-center padding10 grey-txt">
                Copyright © 2017
                <a href="" class="brandcolor">Rentpro. </a>All rights reserved

            </div>

        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Swiper JS -->
    <script src="js/jquery-1.12.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/npm.js"></script> -->
    <script src="js/swiper.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/aos.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container1', {
            pagination: '.swiper-pagination',
            paginationClickable: true
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,

                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false

                    }
                }
            })
            $(".owl-carousel .owl-prev").html("");
            $(".owl-carousel .owl-next").html("");

        })
    </script>
    <script>
        AOS.init({
            easing: 'ease-in-out-sine'
        });

        $(document).on("ready", function()
        {
            $("#search_button").click(function(e){
                e.preventDefault();
                //geocodeAddress(geocoder, map);
                geocodeAddress();
            });

            $("#search_text").on("keyup", function(e){
                geocodeAddress();
            });
        });

function geocodeAddress() {
    geocoder = new google.maps.Geocoder();
    var address = $("#search_text").val();
    if(address != "" && address.length>=3)
    {
        geocoder.geocode({'address': address}, function(results, status) {
            //console.log(results);
            //console.log(status);
            if (status === google.maps.GeocoderStatus.OK) {
                for (var i = results.length - 1; i >= 0; i--) {
                    console.log(results[i]['formatted_address']+": "+results[i]['geometry']['location']);
                }
            }
            else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    else
    {
        //alert("enter area name in search box");
    }
    }

    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDASoM2I4ZJkcCFZVPb2Yp1OH8Z9WRJyE"
        async defer></script> -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHbbed7Sn9InZn4Gw5fJBLnnoee7hgrNM" type="text/javascript"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
