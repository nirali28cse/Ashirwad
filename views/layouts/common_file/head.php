<head>

<?php

$favicon_href = yii\helpers\Url::to('@web/ashirvad/img/fevicon.ico'); 
 
?>
 <link rel="icon" type="image/x-icon" href="<?php echo $favicon_href; ?>"/> 

<title>Ashirvad</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php $this->head() ?>
<?php
 /* $controller_array=array();  
 $action_array=array();  
 $controller_array=['site','potency','quantitytype','producttype','product','forgotpassword'];
 $action_array=['index','create','update','changepass'];
 if((in_array(Yii::$app->controller->id,$controller_array)) and (in_array(Yii::$app->controller->action->id,$action_array))){ }else{ ?>
    <script src="<?php echo  yii\helpers\Url::to('@web/ashirvad/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo  yii\helpers\Url::to('@web/ashirvad/js/bootstrap-3.1.1.min.js'); ?>"></script>
<?php }  */?>     
</head>


<body class="landing">
<?php $this->beginBody() ?>



<div id="wrapper">

