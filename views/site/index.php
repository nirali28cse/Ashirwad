
<?php
$logo_image = yii\helpers\Url::to('@web/ashirvad/images/logo.png'); 
?>

<?php if(Yii::$app->session->hasFlash('success')):?>
	    <script>
			alert("<?php echo Yii::$app->session->getFlash('success'); ?>");
	    </script>
<?php endif; ?>
	
		<section id="featured">
	 
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/slides/1.jpg'); ?>" alt="" />
                <div class="flex-caption">
                   <div class="item_introtext">
					<span>Consultation</span>
					<strong>Wellness Homeopathy Center</strong>  </div>
                </div>
              </li>
              <li>
                <img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/slides/2.jpg'); ?>" alt="" />
                <div class="flex-caption">
                     <div class="item_introtext">
					<span>care for you</span>
					<strong>Ashirvad Hospital</strong>  </div>
                </div>
              </li>
              <li>
                <img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/slides/3.png'); ?>" alt="" />
                <div class="flex-caption">
                     <div class="item_introtext">
					<span>Get Well Soon</span>
					<strong>Dr. Ami Majmundar</strong>  </div>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
 
	</section>
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aligncenter"><h1 class="aligncenter">We CARE For you</h1><span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus temporibus perferendis nesciunt quam repellendus nulla nemo ipsum odit corrupti consequuntur possimus, vero mollitia velit ad consectetur. Alias, laborum excepturi nihil autem nemo numquam, ipsa architecto non, magni consequuntur quam.</div>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	
	<div class="container">
			<div class="row">
		<div class="skill-home"> <div class="skill-home-solid clearfix"> 
		<div class="col-md-3 text-center">
		<div class="c1">
		<span class="icons"><i class="fa fa-bell-o"></i></span> <div class="box-area">
		<h3>Children Care</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
		</div></div>
		</div>
		<div class="col-md-3 text-center"> 
		<div class="c2">
		<span class="icons"><i class="fa fa-comments-o"></i></span> <div class="box-area">
		<h3>Women Care</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p></div>
		</div></div>
		<div class="col-md-3 text-center"> 
		<div class="c3">
		<span class="icons"><i class="fa fa-thumbs-o-up"></i></span> <div class="box-area">
		<h3>Pregnancy Care</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p></div>
		</div></div>
		<div class="col-md-3 text-center"> 
		<div class="c4">
		<span class="icons"><i class="fa fa-wheelchair"></i></span> <div class="box-area">
		<h3>Emergency Care</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident</p>
		</div></div></div>
		</div></div>
		</div> 
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">News & Events</h4>
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio"> 
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
						<div class="item-thumbs">					 
						<img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/works/1.jpg'); ?>" alt=""><br>
						<p><span>21st Aug 2015</span><br/>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.						
						</p>
						</div>
						</li> 
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						<img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/works/2.jpg'); ?>" alt=""><br>
						<p><span>21st Aug 2015</span><br/>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
						</li> 
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						<img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/works/3.jpg'); ?>" alt=""><br>
						<p><span>21st Aug 2015</span><br/>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
						</li>
						
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">					
						<img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/works/4.jpg'); ?>" alt=""><br>
						<p><span>21st Aug 2015</span><br/>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et.</p>
						</li>
						<!-- End Item Project -->
					</ul>
					</section>
				</div>
			</div>
		</div>

	</div>
	</section>
	<div class="testimonial-area">
    <div class="testimonial-solid">
        <div class="container">
            <div class="testi-icon-area">
                <div class="quote">
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class="">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class="">
                        <a href="#"></a>
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                        <p>
                            <b>- Mark John -</b>
                        </p>
                    </div>
                    <div class="item">
                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                        <p>
                            <b>- Jaison Warner -</b>
                        </p>
                    </div>
                    <div class="item active">
                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                        <p>
                            <b>- Tony Antonio -</b>
                        </p>
                    </div>
                    <div class="item">
                        <p>Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                        <p>
                            <b>- Leena Doe -</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
