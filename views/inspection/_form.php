<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\users\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Inspection */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $column_included=[
						'name'=>'Name',
						'abbreviations'=>'Abbreviations',
						'date_of_purches'=>'Date Of Purchase',
						'purchase_qty'=>'Purchase QTY',
						'date_of_mfg'=>'Date Of Manufacturing',
						'issue_date'=>'Date Of Issue',
						'out_qty'=>'Out QTY',
						'balance'=>'Balance',
						]; ?>
<?php $buyer_user_id=ArrayHelper::map(Users::find()->andWhere(['or',['is_buyer_seller'=>1],['is_buyer_seller'=>3]])->orderBy('id')->asArray()->all(),'id', 'username');; ?>


<div class="inspection-form">

    <?php $form = ActiveForm::begin(); ?>
	 <div class="col-lg-8">
 
		<?= $form->field($model, 'buyer_user_id')->widget(Select2::classname(), [
			'data' => $buyer_user_id,
			'options' => ['placeholder' => 'Select Buyer ...'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]); ?>
	 
		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
			
		<?= $form->field($model, 'column_included')->widget(Select2::classname(), [
			'data' => $column_included,
			'options' => ['placeholder' => 'Select Potency ...','id' => 'potency_id', 'multiple' => true],
			'pluginOptions' => [
				'allowClear' => true
			],
		]); ?>
			
		<?php  $date_of_inspection=null; if($model->date_of_inspection!=null){ $date_of_inspection=date('d-M-yy',strtotime($model->date_of_inspection)); }  ?>
		<?= $form->field($model, 'date_of_inspection')->widget(DatePicker::classname(), [
			'options' => ['value' => $date_of_inspection ,'placeholder' => 'Enter Date Of Inspection ...'],
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'dd-M-yyyy',
				'todayHighlight' => true,
				'startDate' => date('d-m-Y h:i:s'),
			]
		]); ?>

		<?php  $start_date=null; if($model->start_date!=null){ $start_date=date('d-M-yy',strtotime($model->start_date)); }  ?>
		<?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
			'options' => ['value' => $start_date ,'placeholder' => 'Enter Date Of Inspection Start ...'],
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'dd-M-yyyy',
				'todayHighlight' => true,
			]
		]); ?>
			
		<?php  $end_date=null; if($model->end_date!=null){ $end_date=date('d-M-yy',strtotime($model->end_date)); }  ?>
		<?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
			'options' => ['value' => $end_date ,'placeholder' => 'Enter Date Of Inspection End ...'],
			'pluginOptions' => [
				'autoclose'=>true,
				'format' => 'dd-M-yyyy',
				'todayHighlight' => true,
			]
		]); ?>
			
		<div class="form-group">
			<?= Html::submitButton('Download', ['class' => 'btn btn-success']) ?>
		</div>
	</div>
    <?php ActiveForm::end(); ?>

</div>
