<?php
use yii\helpers\Url;

$this->title = '877 Rent Pro Admin';
echo Yii::$app->user->identity->firstname;
?>
<div class="site-index">

	<div class="jumbotron">
		<h1>Welcome!</h1>

		<!-- <p>
			<a class="btn btn-lg btn-success" href="<?= Url::to('category')?>">Manage
				Category</a>
		</p>
		<p>
			<a class="btn btn-lg btn-success" href="<?= Url::to('customers')?>">Manage
				Customers</a>
		</p>
		<p>
			<a class="btn btn-lg btn-success" href="<?= Url::to('stores')?>">Manage
				Stores</a>
		</p> -->
	</div>

</div>
