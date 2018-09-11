
<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;    
use kartik\select2\Select2;
use app\models\QuantityType;
use app\models\ProductType;
use app\models\Potency;
use yii\helpers\ArrayHelper;

if(Yii::$app->session->hasFlash('error')):
?>
	<div class="alert alert-error">
	<button data-dismiss="alert" class="close" type="button">×</button>
	<strong>Message !</strong> <?php echo Yii::$app->session->getFlash('error'); ?>
	</div>
<?php endif; ?>

<div class="product-upload adwrapper">

    <?php $product_type_id=ArrayHelper::map(ProductType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $potency_id=ArrayHelper::map(Potency::find()->orderBy('id')->asArray()->all(),'id', 'name'); ?>
    <?php $quantity_type_id=ArrayHelper::map(QuantityType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
	
	<div class="pull-right">
		<?= Html::a('Download Sample CSV', ['uploadcsv'], ['class' => 'btn btn-success']) ?>
	</div>
	<div class="clearfix"></div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			Upload Product CSV
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>
	
	<?php 
	$form = ActiveForm::begin([
		'id' => 'product-form',
		'enableClientValidation'=>false,
		'validateOnSubmit' => true, // this is redundant because it's true by default
		'options' => array('class'=>'form-horizontal','enctype' => 'multipart/form-data')
	]);

	?>

	<?php echo $form->errorSummary($model); ?>

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
		<?= $form->field($model, 'name')->label('Choose CSV',['for'=>'uploadCSV','class'=>'btn btn-default','style'=>'width: 100%;background:#ccc;color:black;'])
				->fileInput(['id'=>'uploadCSV','class'=>'sr-only','accept'=>'csv/*']) ?>
		</div>	

		<input type="submit" name="submit" value="Upload CSV" class="btn btn-success">

	  </div>

	<?php ActiveForm::end(); ?>

</div>




