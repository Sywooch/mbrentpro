<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
use yii\data\Pagination;
?>
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
                                    <a href="'.Yii::$app->urlManager->createUrl(['property/view','id'=>$model->id]).'" style="display: block; color: #49b147;"> Read More </a>
                                </p>
                                <span class="fontbold font20 blue-txt">$'.number_format($model->minrent).'</span>
                            </div>


                        </div>
                    </div>';
            return $return;
        },
    ]);?>