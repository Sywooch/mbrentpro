<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>
    <script type="text/javascript">
        
        // $(document).on("ready", function()
        // {
        //     $("#properties-address").on("keyup", function(e){
        //         geocodeAddress();
        //     });
        // });

    function geocodeAddress() {
        geocoder = new google.maps.Geocoder();
        var address = $("#properties-address").val();
        if(address != "" && address.length>=3)
        {
            geocoder.geocode({'address': address}, function(results, status) {
                //console.log(results);
                //console.log(status);
                if (status === google.maps.GeocoderStatus.OK) {
                    if(results.length>0)
                    {
                        //console.log(results[0]);
                        var lat = results[0]['geometry']['location'].lat();
                        var lng = results[0]['geometry']['location'].lng();
                        console.log(results[i]['formatted_address']);
                        console.log(lat+", "+lng);
                        //$("#").val(results[0]['geometry']['location']);
                    }
                    /*for (var i = results.length - 1; i >= 0; i--) {
                        console.log(results[i]['formatted_address']+": "+results[i]['geometry']['location']);
                    }*/
                }
                else {
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        else
        {
            //alert("enter area name in search box");
        }
    }

    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHbbed7Sn9InZn4Gw5fJBLnnoee7hgrNM" type="text/javascript"></script>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
