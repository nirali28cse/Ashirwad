<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Indents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indent-index adwrapper" >

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="pull-right">
		<?= Html::a('Create Indent', ['create'], ['class' => 'btn btn-success']) ?>
	</div>
	<div class="clearfix"></div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'buyer_user_id',
           // 'seller_user_id',
  
			[
			 'header' => 'Seller',
			 'attribute' => 'seller_user_id',
			 'value' => 'sellerUser.username',
			 'headerOptions' => ['style'=>'color: #428bca;'],
			],     
			[
			 'header' => 'Product Type',
			 'attribute' => 'product_type_id',
			 'value' => 'producttype.name',
			 'headerOptions' => ['style'=>'color: #428bca;'],
			],
			[
			 'header' => 'Potency',
			 'attribute' => 'potency_id',
			 'value' => 'potency.name',
			 'headerOptions' => ['style'=>'color: #428bca;'],
			],
			[
			 'header' => 'Quantity Type',
			 'attribute' => 'quantity_type_id',
			 'value' => 'quantitytype.name',
			 'headerOptions' => ['style'=>'color: #428bca;'],
			],	
			[
			 'header' => 'Product',
			 'attribute' => 'product_id',
			 'value' => 'product.name',
			 'headerOptions' => ['style'=>'color: #428bca;'],
			],

            'total_qty',
            'notes:ntext',
            [
				'attribute' => 'status',
				'format' => 'raw',
				'value' => function ($model) {
					$status=null;
					if($model->status==1) $status = 'Indent Created';
					if($model->status==2) $status = 'Order Created';
					if($model->status==3) $status = 'Order shipped';
					if($model->status==4) $status = 'Order Received';
					return $status;
				},
			],
            'date_time',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{delete}{update}', 
			],
        ],
    ]); ?>
</div>
