<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductOut */

$this->title = 'Create Product Out';
$this->params['breadcrumbs'][] = ['label' => 'Product Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-out-create adwrapper">

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
		'indent' => $indent,
    ]) ?>

</div>
