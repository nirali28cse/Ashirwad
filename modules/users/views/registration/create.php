<?php

use yii\helpers\Html;
$this->title = 'Sign Up';
?>


<section id="content">
	
	<div class="container">

		<div class="row">
		    <div class="col-lg-2"></div>
			<div class="col-lg-8">
				<h2 class="pageTitle"><?= Html::encode($this->title) ?></h2>
				<br/>
				<br/>
				<div class="alert alert-success hidden" id="contactSuccess">
					<strong>Success!</strong> Your message has been sent to us.
				</div>
				<div class="alert alert-error hidden" id="contactError">
					<strong>Error!</strong> There was an error sending your message.
				</div>
				<div class="contact-form">
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>	
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>


