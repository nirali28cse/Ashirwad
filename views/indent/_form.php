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
/* @var $model app\models\Indent */
/* @var $form yii\widgets\ActiveForm */
?>
    <?php $product_type_id=ArrayHelper::map(ProductType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $potency_id=ArrayHelper::map(Potency::find()->orderBy('id')->asArray()->all(),'id', 'name'); ?>
    <?php $quantity_type_id=ArrayHelper::map(QuantityType::find()->orderBy('id')->asArray()->all(),'id', 'name');; ?>
    <?php $seller_user_id=ArrayHelper::map(Users::find()->andWhere(['or',['is_buyer_seller'=>2],['is_buyer_seller'=>3]])->orderBy('id')->asArray()->all(),'id', 'username');; ?>
	<?php $status=['1'=>'Active','0'=>'InActive']; ?>
	
<div class="indent-form">
 <div class="col-lg-8">
    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
