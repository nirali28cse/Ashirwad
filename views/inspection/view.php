<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;
use app\models\ProductIn;

/* @var $this yii\web\View */
/* @var $model app\models\Inspection */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Inspections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$buyer_user_id=null;
$title=null;
$date_of_inspection=null;
$column_included=null;
$start_date=null;
$end_date=null;

$buyer_user_id=$model->buyer_user_id;
$title=$model->title;
$date_of_inspection=$model->date_of_inspection;
$column_included=$model->column_included;
$start_date=date('Y-m-d',strtotime($model->start_date));
$end_date=date('Y-m-d',strtotime($model->end_date));


$productins = ProductIn::find()
			 ->where(['between', 'date_time', $start_date, $end_date])
			 ->andWhere(['=', 'buyer_user_id', $buyer_user_id])
			 ->all();

if(count($productins)>0){

?>

<?php $column_included=[
						'name'=>'Name',
						'abbreviations'=>'Abbreviations',
						'date_of_purches'=>'Date Of Purchase',
						'purchase_qty'=>'Purchase QTY',
						'date_of_mfg'=>'Date Of Manufacturing',
						'issue_date'=>'Date Of Issue',
						'out_qty'=>'Out QTY',
						'balance'=>'Balance',
						]; ?>
						
						
	<div class="inspection-view">

		<h1><?= Html::encode($this->title) ?></h1>

	<table style="width:100%">
	  <tr>
		<?php
		
		$column_includeds=Json::decode($model->column_included);

		if($column_includeds!=null){
			foreach($column_includeds as $columnname){
			?>
				<th><?php echo $column_included[$columnname]; ?></th>
			<?php } ?>
		<?php } ?>
	  </tr>
	  
	  <?php foreach($productins as $productin){

			  $total_in=0; 
			  $total_out=0; 
			  $total_in=$productin->total_qty; 
			  $total_out=$productin->productOut->total_qty;
			  $balance=$total_in-$total_out;

	  ?>
	  <tr>
		<?php if(in_array('name',$column_includeds)){ ?><td><?php echo $productin->product->name; ?></td><?php } ?>
		<?php if(in_array('abbreviations',$column_includeds)){ ?><td><?php echo $productin->product->abbreviations; ?></td><?php } ?>
		<?php if(in_array('date_of_purches',$column_includeds)){ ?><td><?php echo $productin->date_of_purchase; ?></td> <?php } ?>
		<?php if(in_array('purchase_qty',$column_includeds)){ ?><td><?php echo $total_in; ?></td> <?php } ?>
		<?php if(in_array('date_of_mfg',$column_includeds)){ ?><td><?php echo $productin->date_of_mfg; ?></td> <?php } ?>
		<?php if(in_array('issue_date',$column_includeds)){ ?><td><?php echo $productin->issue_date; ?></td> <?php } ?>
		<?php if(in_array('out_qty',$column_includeds)){ ?><td><?php echo $total_out; ?></td> <?php } ?>
		<?php if(in_array('balance',$column_includeds)){ ?><td><?php echo $balance; ?></td> <?php } ?>
	  </tr>
	  <?php } ?>

	</table>

	</div>
<?php }else{ ?>
	<div class="inspection-view">
	 No record Found.
	</div>
<?php } ?>