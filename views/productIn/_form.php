<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\QuantityType;
use app\models\ProductType;
use app\models\Potency;
use app\models\Product;
use app\modules\users\models\Users;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\ProductIn */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $product_type_id=ArrayHelper::map(ProductType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $potency_id=ArrayHelper::map(Potency::find()->orderBy('id')->asArray()->all(),'id', 'name'); ?>
    <?php $quantity_type_id=ArrayHelper::map(QuantityType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $product_id=ArrayHelper::map(Product::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
	<?php $seller_user_id=ArrayHelper::map(Users::find()->andWhere(['or',['is_buyer_seller'=>2],['is_buyer_seller'=>3]])->orderBy('id')->asArray()->all(),'id', 'username');; ?>
    <?php 
		if($poutid>0){
			$status=['3'=>'Order Received']; 
		}
		else{
			$status=['1'=>'Order Created','2'=>'Order shipped','3'=>'Order Received']; 
		}
	?>

<div class="product-in-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'buyer_user_id')->textInput() ?>

		<div class="col-lg-8">
		
	<?php if($poutid>0){ ?>  
		<div class="row">
					<div class="receipt-header receipt-header-mid">
						<div class="col-xs-12 col-sm-12 col-md-12" style="background: #f0f0f0;" >
							<h2>Order Info</h2>
							<div class="receipt-right">
								<p><b>Seller Name :</b> <?php echo $productout->sellerUser->username; ?></p>
								<p><b>Product Type :</b> <?php echo $productout->producttype->name; ?></p>
								<p><b>Potency :</b> <?php echo $productout->potency->name; ?></p>
								<p><b>Quantity Type :</b> <?php echo $productout->quantitytype->name; ?></p>
								<p><b>Product :</b> <?php echo $productout->product->name; ?></p>
								<p><b>Total QTY :</b> <?php echo $productout->total_qty; ?></p>
								<p><b>Notes :</b> <?php echo $productout->notes; ?></p>
							</div>
						</div>
					</div>
				</div>

		<?php }else{  ?>

			
			<?= $form->field($model, 'seller_user_id')->widget(Select2::classname(), [
				'data' => $seller_user_id,
				'options' => ['placeholder' => 'Select Seller ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>

			<?= $form->field($model, 'product_type_id')->widget(Select2::classname(), [
				'data' => $product_type_id,
				'options' => ['placeholder' => 'Select Product Type ...','id' => 'product_type_id'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>

			<?= $form->field($model, 'potency_id')->widget(Select2::classname(), [
				'data' => $potency_id,
				'options' => ['placeholder' => 'Select Potency ...','id' => 'potency_id'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>

			<?= $form->field($model, 'quantity_type_id')->widget(Select2::classname(), [
				'data' => $quantity_type_id,
				'options' => ['placeholder' => 'Select Quantity Type ...','id' => 'quantity_type_id'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>

			<?php
				// Child # 3
				echo $form->field($model, 'product_id')->widget(DepDrop::classname(), [
					'options' => ['placeholder' => 'Select Product ...','id'=>'product_id'],
					'pluginOptions'=>[
						'depends'=>['product_type_id', 'potency_id', 'quantity_type_id'],
						'placeholder'=>'Select Product...',
						'url'=>Url::to(['/site/product'])
					]
				]);
			?>

         <?= $form->field($model, 'total_qty')->textInput(['type' => 'number']) ?>
			
		<?php } ?>
		
<?php  $date_of_mfg=null; if($model->date_of_mfg!=null){ $date_of_mfg=date('M-y',strtotime($model->date_of_mfg)); }  ?>
			<?= $form->field($model, 'date_of_mfg')->widget(DatePicker::classname(), [
				'options' => ['value' => $date_of_mfg,'placeholder' => 'Enter Date Of Mfg ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'startView'=>'year',
                    'minViewMode'=>'months',
					'format' => 'M-yy'
				]
			]); ?>

			<?php  $date_of_expiry=null; if($model->date_of_expiry!=null){ $date_of_expiry=date('M-y',strtotime($model->date_of_expiry)); }  ?>
			<?= $form->field($model, 'date_of_expiry')->widget(DatePicker::classname(), [
				'options' => ['value' => $date_of_expiry,'placeholder' => 'Enter Date Of Expiry ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'startView'=>'year',
                    'minViewMode'=>'months',
					'format' => 'M-yy'
				]
			]); ?>

		    <?php  $date_of_purchase=null; if($model->date_of_purchase!=null){ $date_of_purchase=date('M-y',strtotime($model->date_of_purchase)); }  ?>
			<?= $form->field($model, 'date_of_purchase')->widget(DatePicker::classname(), [
				'options' => ['value' => $date_of_purchase ,'placeholder' => 'Enter Date Of Purchase ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'dd-M-yyyy'
				]
			]); ?>

			<?php  $issue_date=null; if($model->issue_date!=null){ $issue_date=date('M-y',strtotime($model->issue_date)); }  ?>
			<?= $form->field($model, 'issue_date')->widget(DatePicker::classname(), [
				'options' => ['value' => $issue_date,'placeholder' => 'Enter Issue Date ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'dd-M-yyyy'
				]
			]); ?>

		<?= $form->field($model, 'status')->widget(Select2::classname(), [
			'data' => $status,
			'options' => ['placeholder' => 'Select Status ...'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]); ?>
			
		<?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>


        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
