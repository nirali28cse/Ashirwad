<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $status=['1'=>'Active','0'=>'InActive']; ?>
<?php $is_buyer_seller=['0'=>'Visitor User ','1'=>'Buyer','2'=>'Seller','3'=>'Buyer&Seller']; ?>
	
<div class="users-form">
	 <div class="col-lg-8">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email_id')->textInput(['placeholder'=>'Email','maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'is_buyer_seller')->widget(Select2::classname(), [
		'data' => $is_buyer_seller,
		'options' => ['placeholder' => 'Select User Role ...'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>

	<?= $form->field($model, 'status')->widget(Select2::classname(), [
		'data' => $status,
		'options' => ['placeholder' => 'Select Status ...'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
