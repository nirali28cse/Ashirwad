<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Forgot Password?';

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
					<?php if(Yii::$app->session->has("api_success")){ ?>
							<p class="avidocolor"><?php echo Yii::$app->session->get("api_success"); ?></p>
					<?php } ?>
					</header>

					<?php if(Yii::$app->session->has("api_error")){ ?>
							<div class="help-block"><?php echo Yii::$app->session->get("api_error"); ?></div>
					<?php } ?>

					  <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true]); ?>
							<?= $form
								->field($model, 'email')
								->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
						   
						   <input type="submit" value="Submit" class="btn">
						 
					 <?php ActiveForm::end(); ?>	
	
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>



