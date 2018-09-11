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

<div class="product-index" style="padding: 20px;">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
	  <div class="col-sm-9">
		<button type="button" class="btn btn-success" style="width: 100%;text-align: left;"><?= Html::encode($this->title) ?></button>
	  </div>
	  <div class="col-sm-2">
		<?= Html::a('Upload Product CSV', ['/site/uploadcsv'], ['class' => 'btn btn-success','style'=>'float: right;']) ?>
	  </div>
	  <div class="col-sm-1">
		<?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success','style'=>'float: right;']) ?>
	  </div>
	</div>
    <br/>
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
			 'headerOptions' => ['style'=>'color: #5cb85c;'],
			],
			[
			 'header' => 'Potency',
			 'attribute' => 'potency_id',
			 'value' => 'potency.name',
			 'headerOptions' => ['style'=>'color: #5cb85c;'],
			],
			[
			 'header' => 'Quantity Type',
			 'attribute' => 'quantity_type_id',
			 'value' => 'quantitytype.name',
			 'headerOptions' => ['style'=>'color: #5cb85c;'],
			],
			 
            'name',
            'abbreviations',
            //'date_of_purchase',
			[
				'attribute' => 'date_of_purchase',
				// 'format' => ['date', 'php:d-M-Y']
			],	
			[
				'attribute' => 'date_of_mfg',
				// 'format' => ['date', 'php:d-M-Y']
			],	
			[
				'attribute' => 'date_of_expiry',
				// 'format' => ['date', 'php:d-M-Y']
			],
			[
				'attribute' => 'issue_date',
				// 'format' => ['date', 'php:d-M-Y']
			],

            'total_in',
            'total_out',
            'balance',
       //     'status',
            [
				'attribute' => 'status',
				'format' => 'raw',
				'value' => function ($model) {
					return $model->status == 0 ? "In Active" : "Active";
				},
			],	
            //'date_time',

            ['class' => 'yii\grid\ActionColumn',
			'template' => '{delete}{update}', 
			],
        ],
    ]); ?>
</div>
