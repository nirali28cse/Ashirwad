<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Update Product: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update adwrapper">

	<div class="row">
	  <div class="col-sm-12">
		<button type="button" class="btn btn-success" style="width: 100%;text-align: left;"><?= Html::encode($this->title) ?></button>
	  </div>
	</div>
	<br/>
	<br/>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
