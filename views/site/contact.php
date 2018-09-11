<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>

<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Contact Us</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
	<div class="row">
 <div class="col-md-12">
							 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:300px;width:100%;"><div id="gmap_canvas" style="height:300px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(40.805478,-73.96522499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.805478, -73.96522499999998)});infowindow = new google.maps.InfoWindow({content:"<b>The Breslin</b><br/>2880 Broadway<br/> New York" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
								</div>
</div>


	<div class="row">
								<div class="col-md-6">
									<br>
									<div class="alert alert-success hidden" id="contactSuccess">
										<strong>Success!</strong> Your message has been sent to us.
									</div>
									<div class="alert alert-error hidden" id="contactError">
										<strong>Error!</strong> There was an error sending your message.
									</div>
									<div class="contact-form">
								   <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

										<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

										<?= $form->field($model, 'email') ?>

										<?= $form->field($model, 'subject') ?>

										<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

										<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
											'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
										]) ?>

										<div class="form-group">
											<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
										</div>

									<?php ActiveForm::end(); ?>
									</div>
								</div>
								<div class="col-md-6">
								
<div class="span4"><div class="title-box clearfix "><h3 class="title-box_primary">Contact info</h3></div> 
<h5>Lorem ipsum dolor sit amet, cadipisicing sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium.</h5>
<p>Lorem ipsum dolor sit amet, cadipisicing sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, cadipisicing sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium Atque sed, quidem quis praesentium, ut unde fuga error commodi architecto, laudantium culpa tenetur at id, beatae pet.<br>
</p><address>
<strong>The Company Name.<br>
12345 St John Point,<br>
Brisbean, ABC 12 St 11.</strong><br>
Telephone: +1 234 567 890<br>
FAX: +1 234 567 890<br>
E-mail: <a href="mailto:info@sitename.org">mail@sitename.org</a><br>
</address> </div> 
								</div>
							</div>
	</div>
 
	</section>
	
	