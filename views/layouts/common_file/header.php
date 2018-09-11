<?php 
$isGuest = Yii::$app->user->isGuest;

$dashbord=null;
$about=null;
$events=null;
$portfolio=null;
$contact=null;
$login=null;
$registration=null;
$changepass=null;

$action=Yii::$app->controller->action->id;
$controller=Yii::$app->controller->id;
if($action=='dashbord') $dashbord='active';
if($action=='about') $about='active';
if($action=='events') $events='active';
if($action=='portfolio') $portfolio='active';
if($action=='contact') $contact='active';
if($controller=='login' and $action=='index') $login='active';
if($controller=='registration' and $action=='index') $registration='active';
if($controller=='forgotpassword' and $action=='changepass') $changepass='active';


?>	
	
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>"><img src="<?php echo yii\helpers\Url::to('@web/ashirvad/img/logo.png'); ?>" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo $dashbord; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/default/dashbord">Dashbord</a></li> 
						<li class="<?php echo $about; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=site/about">About Us</a></li>
						<li class="<?php echo $events; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=site/events">Events </a></li>
                        <li class="<?php echo $portfolio; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=site/portfolio">Gallery</a></li>
                        <li class="<?php echo $contact; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=site/contact">Contact</a></li>
						<?php if($isGuest){ ?>
							<li class="<?php echo $login; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/login" ><span></span> Sign In</a></li>
							<li class="<?php echo $registration; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/registration" ><span></span> Sign Up</a></li>
						<?php }else{
								$username = Yii::$app->user->identity->username;
								$is_admin = Yii::$app->user->identity->is_admin;
						?>
						<li class="<?php echo $changepass; ?>"><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/forgotpassword/changepass"  style="margin: 0;">Reset Password</a></li>
						<li><a href="<?php echo Yii::$app->homeUrl; ?>?r=users/login/logout"  style="margin: 0;">Sign Out</a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </div>
	</header>