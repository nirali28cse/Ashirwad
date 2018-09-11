<style>
.summary{
 float: right;
}
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if(Yii::$app->session->hasFlash('success')):?>
	    <script>
			alert("<?php echo Yii::$app->session->getFlash('success'); ?>");
	    </script>
<?php endif; ?>

<div class="product-index adwrapper">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	<div class="pull-right">
		<?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success','style'=>'float: right;']) ?>
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
            //'product_type_id',
            //'potency_id',
            //'quantity_type_id',
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
			 
            'name',
            'abbreviations',

       //     'status',
            [
				'attribute' => 'status',
				'format' => 'raw',
				'value' => function ($model) {
					return $model->status == 0 ? "In Active" : "Active";
				},
			],	
            //'date_time',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{delete}{update}', 
			],
        ],
    ]); ?>
</div>
