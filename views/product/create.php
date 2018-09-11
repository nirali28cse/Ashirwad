<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create adwrapper">
 
	<div class="pull-right">
		<?= Html::a('Upload Product CSV', ['uploadcsv'], ['class' => 'btn btn-success','style'=>'float: right;']) ?>
	</div>
	<div class="clearfix"></div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			Create Product
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>

	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
