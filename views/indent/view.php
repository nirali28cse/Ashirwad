<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indent */

$this->title = 'Detail Indent';
$this->params['breadcrumbs'][] = ['label' => 'Indents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="indent-view adwrapper">
	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>
	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'seller_user_id',
            'product_type_id',
            'potency_id',
            'quantity_type_id',
            'product_id',
            'total_qty',
            'notes:ntext',
            'status',
            'date_time',
        ],
    ]) ?>

</div>
