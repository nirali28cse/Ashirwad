<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InspectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-index adwrapper">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="pull-right">
		 <?= Html::a('Download Inspection', ['create'], ['class' => 'btn btn-success']) ?>
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
            'title',
            'date_of_inspection',
           // 'column_included',
            'start_date',
            'end_date',
            //'date_time',

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{delete}{printinspection}', 
				'buttons'  => [
					'printinspection'   => function ($url, $model ) {
							$url = Url::to(['/inspection/view', 'id' => $model->id]);
							return Html::a('Print Inspection', $url, ['class'=>'btn','style'=>'margin: 0 10px;','target'=>'_blank','title' => 'Print Inspection']);
					},
				],

			],
        ],
    ]); ?>
</div>
