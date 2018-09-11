<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Account Settings';
?>

		
<section id="content">
	
	<div class="container">

		<div class="row">
		    <div class="col-lg-2"></div>
			<div class="col-lg-8">
				<h2 class="pageTitle"><?= Html::encode($this->title) ?></h2>
				<br/>
				<br/>

				<?php if(Yii::$app->session->has("api_success")){ ?>
						<p class="avidocolor"><?php echo Yii::$app->session->get("api_success"); ?></p>
				<?php } ?>
				</header>

				<?php if(Yii::$app->session->has("api_error")){ ?>
						<div class="help-block"><?php echo Yii::$app->session->get("api_error"); ?></div>
				<?php } ?>
				<div class="contact-form">

					<?php $form = ActiveForm::begin(['id'=>'registrationform']); ?>
						
					<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'value' =>Yii::$app->session->get('first_name')]) ?>

					<?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'value' =>Yii::$app->session->get('last_name')]) ?>

					<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

					<input type="submit" value="Update" id="register-submit"  class="button special">

					<?php ActiveForm::end(); ?>

				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
</section>


