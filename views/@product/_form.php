<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\QuantityType;
use app\models\ProductType;
use app\models\Potency;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">


    <?php $product_type_id=ArrayHelper::map(ProductType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $potency_id=ArrayHelper::map(Potency::find()->orderBy('id')->asArray()->all(),'id', 'name'); ?>
    <?php $quantity_type_id=ArrayHelper::map(QuantityType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $status=['1'=>'Active','0'=>'InActive']; ?>
	
    <?php $form = ActiveForm::begin(); ?>

	 <div class="row">
		<div class="col-lg-4">
			<?= $form->field($model, 'product_type_id')->widget(Select2::classname(), [
				'data' => $product_type_id,
				'options' => ['placeholder' => 'Select Product Type ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'potency_id')->widget(Select2::classname(), [
				'data' => $potency_id,
				'options' => ['placeholder' => 'Select Potency ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'quantity_type_id')->widget(Select2::classname(), [
				'data' => $quantity_type_id,
				'options' => ['placeholder' => 'Select Quantity Type ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
	  </div>

	
	 <div class="row">
		<div class="col-lg-4">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'abbreviations')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'status')->widget(Select2::classname(), [
				'data' => $status,
				'options' => ['placeholder' => 'Select Status ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
	 </div>	
	 
	 <div class="row">
		<div class="col-lg-4">
			<?= $form->field($model, 'total_in')->textInput(['type' => 'number']) ?>
		</div>	
		<div class="col-lg-4">
			<?= $form->field($model, 'total_out')->textInput(['type' => 'number']) ?>
		</div>	
		<div class="col-lg-4">
			<?= $form->field($model, 'balance')->textInput(['type' => 'number']) ?>
		</div>
	 </div>
	 
	 <div class="row">
		<div class="col-lg-3">
		    <?php  $date_of_purchase=null; if($model->date_of_purchase!=null){ $date_of_purchase=date('M-y',strtotime($model->date_of_purchase)); }  ?>
			<?= $form->field($model, 'date_of_purchase')->widget(DatePicker::classname(), [
				'options' => ['value' => $date_of_purchase ,'placeholder' => 'Enter Date Of Purchase ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'startView'=>'year',
                    'minViewMode'=>'months',
					'format' => 'M-yy'
				]
			]); ?>
		</div>
		<div class="col-lg-3">
			<?php  $date_of_mfg=null; if($model->date_of_mfg!=null){ $date_of_mfg=date('M-y',strtotime($model->date_of_mfg)); }  ?>
			<?= $form->field($model, 'date_of_mfg')->widget(DatePicker::classname(), [
				'options' => ['value' => $date_of_mfg,'placeholder' => 'Enter Date Of Mfg ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'dd-M-yyyy'
				]
			]); ?>
		</div>
		<div class="col-lg-3">
			<?php  $date_of_expiry=null; if($model->date_of_expiry!=null){ $date_of_expiry=date('M-y',strtotime($model->date_of_expiry)); }  ?>
			<?= $form->field($model, 'date_of_expiry')->widget(DatePicker::classname(), [
				'options' => ['value' => $date_of_expiry,'placeholder' => 'Enter Date Of Expiry ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'dd-M-yyyy'
				]
			]); ?>
		</div>
		<div class="col-lg-3">
			<?php  $issue_date=null; if($model->issue_date!=null){ $issue_date=date('M-y',strtotime($model->issue_date)); }  ?>
			<?= $form->field($model, 'issue_date')->widget(DatePicker::classname(), [
				'options' => ['value' => $issue_date,'placeholder' => 'Enter Issue Date ...'],
				'pluginOptions' => [
					'autoclose'=>true,
					'format' => 'dd-M-yyyy'
				]
			]); ?>
		</div>
	 </div>
	 



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
