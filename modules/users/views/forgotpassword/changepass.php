<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset Password';
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
					 <?php $form = ActiveForm::begin(['id' => 'changepass-form', 'enableClientValidation' => true]); ?>
							<?= $form->field($model, 'new_password')->label(false)->passwordInput(['placeholder' => $model->getAttributeLabel('EnterNewPassword')]);	 ?>			
							<?= $form->field($model, 'reenter_password')->label(false)->passwordInput(['placeholder' => $model->getAttributeLabel('ReEnterNewPassword')]);	 ?>			
						   <input type="submit" value="Reset Password" class="btn">
					 <?php ActiveForm::end(); ?>	
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>


							

	
