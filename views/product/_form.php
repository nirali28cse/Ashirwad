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

	 <div class="col-lg-8">
		<div class="col-lg-12">
			<?= $form->field($model, 'product_type_id')->widget(Select2::classname(), [
				'data' => $product_type_id,
				'options' => ['placeholder' => 'Select Product Type ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
		<div class="col-lg-12">
			<?= $form->field($model, 'potency_id')->widget(Select2::classname(), [
				'data' => $potency_id,
				'options' => ['placeholder' => 'Select Potency ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
		<div class="col-lg-12">
			<?= $form->field($model, 'quantity_type_id')->widget(Select2::classname(), [
				'data' => $quantity_type_id,
				'options' => ['placeholder' => 'Select Quantity Type ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
		<div class="col-lg-12">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-lg-12">
			<?= $form->field($model, 'abbreviations')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-lg-12">
			<?= $form->field($model, 'status')->widget(Select2::classname(), [
				'data' => $status,
				'options' => ['placeholder' => 'Select Status ...'],
				'pluginOptions' => [
					'allowClear' => true
				],
			]); ?>
		</div>
		<div class="col-lg-12">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>
	 </div>	

    <?php ActiveForm::end(); ?>

</div>
