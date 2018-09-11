<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-in-index adwrapper">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<div class="pull-right">
		<?= Html::a('Generate Direct Product', ['dcreate'], ['class' => 'btn btn-success']) ?>
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
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            // 'buyer_user_id',
			[
			 'header' => 'Buyer',
			 'attribute' => 'seller_user_id',
			 'value' => 'sellerUser.username',
			 'headerOptions' => ['style'=>'color: #428bca;'],
			],   
           // 'seller_user_id',
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
            'date_of_purchase',
            'date_of_mfg',
            'date_of_expiry',
            'issue_date',
            'notes:ntext',
            //'status',
            //'date_time',
            [
				'attribute' => 'status',
				'format' => 'raw',
				'value' => function ($model) {
					$status=null;
					if($model->status==1) $status = 'Order Created';
					if($model->status==2) $status = 'Order shipped';
					if($model->status==3) $status = 'Order Received';
					return $status;
				},
			],
            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{updateproduct}', 
				'buttons'  => [
					'updateproduct'   => function ($url, $model ) {
							$url = Url::to(['/productin/update', 'id' => $model->id]);
							return Html::a('Update Product', $url, ['class'=>'btn','title' => 'Convert Order']);
					},
				],

			],
        ],
    ]); ?>
</div>
