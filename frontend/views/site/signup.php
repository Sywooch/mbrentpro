<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'firstname')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'lastname')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'user_type_id')->radioList([2=>'Landlord',3=>'Tenant' ], ["class"=>"rad", "item"=> function($index, $label, $name, $checked, $value){
                if(!$checked)

                return "<input name='".$name."' type='radio' id='rad_".$label."'  value='".$value."'/><label for='rad_".$label."'  class='rad-label'>".$label."</label>";
                else
                return "<input name='".$name."' type='radio' id='rad_".$label."'  value='".$value."' checked/><label for='rad_".$label."'  class='rad-label'>".$label."</label>";
                }]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
