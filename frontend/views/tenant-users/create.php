<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TenantUsers */

$this->title = 'Create Tenant Users';
$this->params['breadcrumbs'][] = ['label' => 'Tenant Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid grey ">

	<div class="container-fluid grey ">
		<div class="container">
			<h3 class="light-blue  padding-bottom20 " style="margin-bottom: 0px;">  My Profile </h3> </div>

			<div class=" container white-bg borderradius " style="border: 1px solid #b3b4b6;     margin-bottom: 20px;">

				<?= $this->render('_form', [
					'model' => $model,
					]) ?>

				</div>
			</div>
			</div>
