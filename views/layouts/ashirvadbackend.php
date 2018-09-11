		
<?php include('common_file/html_start.php'); ?>


<?php include('common_file/head.php'); ?>


<?php include('common_file/header.php'); ?>

  <div class="row">
   
    <div class="col-xs-2">
		<?php
		echo yii\widgets\Menu::widget([
			'items' => [
				['label' => 'Potency', 'url' => ['/potency']],
				['label' => 'Quantity Type', 'url' => ['/quantitytype']],
				['label' => 'Product Type', 'url' => ['/producttype']],
			//	['label' => 'Product', 'url' => ['product']],
				[
					'label' => 'Product',
					'url' => ['#'],
					'options'=>['class'=>'dropdown'],
					'template' => '<a href="{url}" class="href_class">{label}</a>',
					'items' => [
						['label' => 'All Product', 'url' => ['/product']],
						['label' => 'Add Product', 'url' => ['/product/create']],
					]
				],
				['label' => 'Indent', 'url' => ['/indent']],
				['label' => 'Inspection', 'url' => ['/inspection']],
				['label' => 'Product In', 'url' => ['/productin']],
				['label' => 'Product Out', 'url' => ['/productout']],
		
			],
			'options' => [
				'class' => 'navbar-nav nav',
				'id'=>'navbar-id',
				// 'style'=>'font-size: 14px;',
				// 'data-tag'=>'yii2-menu',
			],
			'itemOptions'=>array('style'=>'width:100%;'),
		]);
		?>
	</div>
    <div class="col-xs-10">	
		<?php  echo $content; ?>
	</div>

 </div>



<?php 
/* $controller=Yii::$app->controller->id;
$action=Yii::$app->controller->action->id;
$default_controller=['site','product','forgotpassword'];
$default_action=['index','changepass','create','update'];
if(in_array($controller,$default_controller) and in_array($action,$default_action)){

 ?>
 <script src="<?php echo  yii\helpers\Url::to('@web/ashirvad/js/jquery-2.1.4.min.js'); ?>"></script>

<script src="<?php echo  yii\helpers\Url::to('@web/ashirvad/js/bootstrap-3.1.1.min.js'); ?>"></script>
<?php } */ ?>

<?php


/* 

<!-- popup for sign in form -->
	<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div id="small-dialog1" class="mfp-hide book-form">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Sign In </h3>
					<form action="#" method="post">
						<input type="email" name="Email" class="email" placeholder="Email" required="" />
						<input type="password" name="Password" class="password" placeholder="Password" required="" />
						<ul>
							<li>
								<input type="checkbox" id="brand1" value="">
								<label for="brand1"><span></span>Remember me</label>
							</li>
						</ul>
						<a href="#">Forgot Password?</a><br>
						<div class="clearfix"></div>
						<input type="submit" value="Sign In">
					</form>
					<div class="w3ls-or">
						<p>Or</p>
					</div>
					<div class="top-middle w3ls-sma">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- //popup for sign in form -->
	<!-- popup for sign up form -->
	<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div id="small-dialog2" class="mfp-hide book-form">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Sign Up</h3>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Your Name" required="" />
						<input type="email" name="Email" class="email" placeholder="Email" required="" />
						<input type="password" name="Password" id="password1" class="password" placeholder="Password" required="" />
						<input type="password" name="Password" id="password2" class="password" placeholder="Confirm Password" required="" />
						<input type="submit" value="Sign Up">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //popup for sign up form -->
	
	*/
	?>
	
	
<?php  include('common_file/footer.php'); ?>

		
<?php include('common_file/html_end.php'); ?>


