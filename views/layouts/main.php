<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?php include('common_file/head.php'); ?>


<?php $this->beginBody() ?>

<?php include('common_file/header.php'); ?>


  <div class="row mrow">
   
    <div class="col-xs-2">
		<?php

		$common_array=[];
		$admin_array=[];
		$seller_array=[];
		$buyer_array=[];
		$common_array=[
						['label' => 'DashBord', 'url' => ['/users/default/dashbord']]
					  ];
		$admin_array=[
						['label' => 'Potency', 'url' => ['/potency/index']],
						['label' => 'Quantity Type', 'url' => ['/quantitytype/index']],
						['label' => 'Product Type', 'url' => ['/producttype/index']],
						['label' => 'Product', 'url' => ['/product/index']],
						['label' => 'Make User Seller/Buyer', 'url' => ['/users/users/index']],
						['label' => 'Indent', 'url' => ['/indent/index']],
						['label' => 'Order', 'url' => ['/productout/index']],
						['label' => 'Products', 'url' => ['/productin/index']],
						['label' => 'Inspection/Product Report', 'url' => ['/inspection/index']],
					//	['label' => 'Product Report', 'url' => ['/inspection/create']],
					 ];
		$buyer_array=[
						[
							'label' => 'Buyer',
							'url' => ['/productin/index'],
							'options'=>['class'=>'dropdown'],
							'template' => '<a href="{url}" class="href_class">{label}</a>',
							'items' => [
								['label' => 'My Indents', 'url' => ['/indent/bmyindent']],
								['label' => 'My Orders', 'url' => ['/productout/bmyorder']],
								['label' => 'My Products ', 'url' => ['/productin/bmyproduct']],
							]
						],
					  ];	
		$seller_array=[
						[
							'label' => 'Seller',
							'url' => ['/indent/index'],
							'options'=>['class'=>'dropdown'],
							'template' => '<a href="{url}" class="href_class">{label}</a>',
							'items' => [
								['label' => 'My Indents', 'url' => ['/indent/smyindent']],
								['label' => 'My Orders', 'url' => ['/productout/smyorder']],
							]
						],
					 ];
				
		$menuarray=[];		
		$menuarray1=[];		

		// If User Is Visitor user
		if(Yii::$app->user->identity->is_buyer_seller==0){
			$menuarray=$common_array;
		}	

		// If User Is Buyer	
		if(Yii::$app->user->identity->is_buyer_seller==1){
			$menuarray=array_merge($common_array,$buyer_array);
		}	
		
		// If User Is Seller
		if(Yii::$app->user->identity->is_buyer_seller==2){
			$menuarray=array_merge($common_array,$seller_array);
		}

		// If User Is Buyer and Seller		
		if(Yii::$app->user->identity->is_buyer_seller==3){
			$menuarray1=array_merge($common_array,$buyer_array);
			$menuarray=array_merge($menuarray1,$seller_array);
		}
		// If User Is Admin
		if(Yii::$app->user->identity->is_admin==1){
			$menuarray=array_merge($common_array,$admin_array);
		}
		
		
		
		/* $menuarray=[
				['label' => 'DashBord', 'url' => ['/users/default/dashbord']],
				['label' => 'Potency', 'url' => ['/potency/index']],
				['label' => 'Quantity Type', 'url' => ['/quantitytype/index']],
				['label' => 'Product Type', 'url' => ['/producttype/index']],
			//	['label' => 'Product', 'url' => ['product']],
				[
					'label' => 'Product',
					'url' => ['/product/index'],
				],	
				['label' => 'Make User Seller/Buyer', 'url' => ['/users/users/index']],
				[
					'label' => 'Indent',
					'url' => ['/indent/index'],
					'options'=>['class'=>'dropdown'],
					'template' => '<a href="{url}" class="href_class">{label}</a>',
					'items' => [
					//	['label' => 'Create Indent', 'url' => ['/indent/create']],
						['label' => 'My Indent(For Seller Dashbord)', 'url' => ['/indent/smyindent']],
						['label' => 'My Indent(For Buyer Dashbord)', 'url' => ['/indent/bmyindent']],
					]
				],
				[
					'label' => 'Product Out',
					'url' => ['/productout/index'],
					'options'=>['class'=>'dropdown'],
					'template' => '<a href="{url}" class="href_class">{label}</a>',
					'items' => [
					//	['label' => 'Create Product Out', 'url' => ['/productout/create']],
						['label' => 'My Order(For Seller Dashbord)', 'url' => ['/productout/smyorder']],
						['label' => 'My Order(For Buyer Dashbord)', 'url' => ['/productout/bmyorder']],
					]
				],
				[
					'label' => 'Product In',
					'url' => ['/productin/index'],
					'options'=>['class'=>'dropdown'],
					'template' => '<a href="{url}" class="href_class">{label}</a>',
					'items' => [
						['label' => 'My Products (For Buyer Dashbord)', 'url' => ['/productin/bmyproduct']],
					]
				],
				
				
				['label' => 'Inspection', 'url' => ['/inspection/index']],
				['label' => 'Product Report', 'url' => ['/inspection/create']],
			];
		 */
		
		
		echo yii\widgets\Menu::widget([
		    
			'items' => $menuarray,
			
			'options' => [
				'class' => 'navbar-nav nav leftsidebar',
				'id'=>'navbar-id',
				
				// 'style'=>'font-size: 14px;',
				// 'data-tag'=>'yii2-menu',
			],
			'itemOptions'=>array('style'=>'width:100%;'),
			'activeCssClass'=>'myactive',
			
		]);
		?>
	</div>
    <div class="col-xs-10">	
		<?php  echo $content; ?>
	</div>

 </div>

 
 
 	
<?php  include('common_file/footer.php'); ?>

		
<?php include('common_file/html_end.php'); ?>
