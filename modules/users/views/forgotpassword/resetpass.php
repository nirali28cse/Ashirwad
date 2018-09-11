<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset Password';
?>

		
<div id="main" class="wrapper style1">
<div class="container">
<header class="major">
	<h2><?= Html::encode($this->title) ?></h2>
<?php if(Yii::$app->session->has("api_success")){ ?>
		<p class="avidocolor"><?php echo Yii::$app->session->get("api_success"); ?></p>
<?php } ?>
</header>

<?php if(Yii::$app->session->has("api_error")){ ?>
		<div class="help-block"><?php echo Yii::$app->session->get("api_error"); ?></div>
<?php } ?>

  <?php $form = ActiveForm::begin(['id' => 'changepass-form', 'enableClientValidation' => true]); ?>

		<?= $form->field($model, 'new_password')->passwordInput();	 ?>			
		<?= $form->field($model, 'reenter_password')->passwordInput();	 ?>		
        <?php if(isset($_GET['tt'])){ ?>		
			<input type="hidden" name="token" value="<?php echo $_GET['tt']; ?>"  class="button special">       
	   <?php } ?>		
	   
	   <input type="submit" value="Reset Password"  class="button special">
	   
 <?php ActiveForm::end(); ?>	
 

</div>
</div>							

	
