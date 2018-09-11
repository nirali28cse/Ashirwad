<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_type_id') ?>

    <?= $form->field($model, 'potency_id') ?>

    <?= $form->field($model, 'quantity_type_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'abbreviations') ?>

    <?php // echo $form->field($model, 'date_of_purchase') ?>

    <?php // echo $form->field($model, 'date_of_mfg') ?>

    <?php // echo $form->field($model, 'date_of_expiry') ?>

    <?php // echo $form->field($model, 'issue_date') ?>

    <?php // echo $form->field($model, 'total_in') ?>

    <?php // echo $form->field($model, 'total_out') ?>

    <?php // echo $form->field($model, 'balance') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
