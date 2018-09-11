<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\QuantityType;
use app\models\ProductType;
use app\models\Potency;
use app\modules\users\models\Users;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\ProductOut */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $product_type_id=ArrayHelper::map(ProductType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $potency_id=ArrayHelper::map(Potency::find()->orderBy('id')->asArray()->all(),'id', 'name'); ?>
    <?php $quantity_type_id=ArrayHelper::map(QuantityType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
	<?php $buyer_user_id=ArrayHelper::map(Users::find()->andWhere(['or',['is_buyer_seller'=>1],['is_buyer_seller'=>3]])->orderBy('id')->asArray()->all(),'id', 'username');; ?>
    <?php $status=['1'=>'Order Created','2'=>'Order shipped']; ?>
	
<div class="product-out-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="col-lg-8">
	<?php if((Yii::$app->controller->action->id=='createorder') or (Yii::$app->controller->action->id=='update' and $model->indent_id>0)){ ?>  
	<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-12 col-sm-12 col-md-12" style="background: #f0f0f0;" >
						<h2>Order Info</h2>
						<div class="receipt-right">
							<p><b>Buyer Name :</b> <?php echo $indent->buyerUser->username; ?></p>
							<p><b>Product Type :</b> <?php echo $indent->producttype->name; ?></p>
							<p><b>Potency :</b> <?php echo $indent->potency->name; ?></p>
							<p><b>Quantity Type :</b> <?php echo $indent->quantitytype->name; ?></p>
							<p><b>Product :</b> <?php echo $indent->product->name; ?></p>
						</div>
					</div>
				</div>
            </div>
				
	<?php 
	$model->total_qty=$indent->total_qty;
	$model->notes=$indent->notes;
	if(Yii::$app->controller->action->id=='createorder'){
		$model->status=$indent->status;	
	}
	
	?>
	
	<?php }else{  ?>
	
			<?= $form->field($model, 'buyer_user_id')->widget(Select2::classname(), [
				'data' => $buyer_user_id,
				'options' => ['placeholder' => 'Select Buyer ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
			<?php // $form->field($model, 'seller_user_id')->textInput() ?>

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
<?php } ?>

			<?= $form->field($model, 'total_qty')->textInput(['type' => 'number']) ?>
			
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
