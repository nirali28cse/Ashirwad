<?php 
$isGuest = Yii::$app->user->isGuest;
?>	
	
	<header>
		<div class="top-header header"  id="home">
			<div class="container">
				<div class="col-md-8 col-sm-8 col-xs-8 top-left">
					<p><i class="fa fa-map-marker" aria-hidden="true"></i> C/o Ashirvad Hospital, opp. pologround, Palace Road, Vadodara - 390007,Gujarat,India</p>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 top-right">
					<?php if($isGuest){ ?>
						<a href="<?php echo Yii::$app->homeUrl; ?>?r=users/login" ><span></span> Sign In</a>
						<a href="<?php echo Yii::$app->homeUrl; ?>?r=users/registration" ><span></span> Sign Up</a>
					<?php }else{
							$username = Yii::$app->user->identity->username;
							$is_admin = Yii::$app->user->identity->is_admin;
					?>
						<div class="dropdown">
						  <button class="btn btn-success dropdown-toggle" style="border-radius: unset;" type="button" data-toggle="dropdown">
						  <i class="fa fa-user" aria-hidden="true"></i>&nbsp;  <?php echo $username; ?>
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu dropdown-menu-right" style="padding: 0;">
						  <li><a href="<?php echo Yii::$app->homeUrl; ?>"  style="margin: 0;">Home</a></li>
							<?php /* if($is_admin){ ?>	
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=potency" style="margin: 0;">Potency</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=quantitytype" style="margin: 0;">Quantity Type</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=producttype" style="margin: 0;">Product Type</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=product" style="margin: 0;">Product</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=indent" style="margin: 0;">Indent</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=inspection" style="margin: 0;">Inspection</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=productin" style="margin: 0;">Product In</a></li>
								<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=productout" style="margin: 0;">Product Out</a></li>
							<?php } */ ?>
							<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/forgotpassword/changepass"  style="margin: 0;">Reset Password</a></li>
							<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/login/logout"  style="margin: 0;">Sign Out</a></li>
						  </ul>
						</div>
					<?php } ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	
	
	
	