<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductIn */

$this->title = 'Update Product';
$this->params['breadcrumbs'][] = ['label' => 'Product Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-in-update adwrapper">

	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>
	
    <?= $this->render('_form', [
        'model' => $model,
        'productout' => $productout,
        'poutid' => $poutid,
    ]) ?>

</div>
