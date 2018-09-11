<style>
#producttype-name-cont{
    display: flow-root;
    padding-bottom: 10px;
}
</style>




<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\ProductType;
use yii\helpers\ArrayHelper;
use \kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Types';
$this->params['breadcrumbs'][] = $this->title;
$action = 'producttype';
?>

<div class="adwrapper <?php echo $action; ?>-index">

<?php
$editable = Editable::begin([
    'model'=>$model,
    'attribute'=>'name',
    'asPopover' => true,
    'size'=>'md',
    'placement'=>'left',
	'header' => $this->title,
	'type'=>'success',
    'editableValueOptions'=>['class'=>'btn btn-md btn-success pull-right'],
    'displayValue' => 'Add '.$this->title,
    'options'=>['placeholder'=>'Enter name...'],
	'resetButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ban-circle"></i>&nbsp;Clear'],  
	'submitButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ok"></i>&nbsp;Add'],  
	'formOptions' => [
				'method' => 'POST',
				'action' => Yii::$app->homeUrl.'?r=producttype/create'
			],
	'ajaxSettings' => [ 'success' => new \yii\web\JsExpression('function(html)
            {
				//	alert("Product Type added successfully.");
					window.location = "'.Yii::$app->homeUrl.'?r='.$action.'";
            }')
			],
]);
$form = $editable->getForm();

$editable->afterInput = 
    $editable->afterInput = 
    $form->field($model, 'status')->label(false)->widget(GridView::FILTER_SELECT2, [
        'data'=>['1'=>'Active','0'=>'InActive'], // any list of values
        'options'=>['placeholder'=>'Enter status...'],
        'pluginOptions'=>['allowClear'=>true]
    ]) . "\n";
	
Editable::end();

$gridColumns=null;

$bordered=true;  // table with border=true and without border=false
$striped=false;
$condensed=true;
$responsive=false;
$hover=true;
$pageSummary=false; // show summary at bottom
$heading=$this->title;
$exportConfig=null;

$gridColumns = [

[
    'class' => 'kartik\grid\SerialColumn',
    'contentOptions' => ['class' => 'kartik-sheet-style'],
    'width' => '36px',
    'header' => '',
    'headerOptions' => ['class' => 'kartik-sheet-style']
],
 /* [
    'attribute' => 'id', 
    'vAlign' => 'middle',
    'width' => '50px',
], */ 
[
    'class' => 'kartik\grid\EditableColumn',
    'attribute' => 'name',
    'vAlign' => 'middle',
    'width' => '210px',
	'editableOptions' => function ($model, $key, $index) {
		return [
			'resetButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ban-circle"></i>&nbsp;Clear'],  
			'submitButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ok"></i>&nbsp;Save'],  
			'formOptions' => [
				'method' => 'POST',
				'action' => Yii::$app->homeUrl.'?r=producttype/update&id='.$model->id
			],
			'options' => [
				'id' => $index . '_' . $model->id,
			]
		];
	},
],
[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status',
            'pageSummary' => false,
            'width' => '100px',
            // filtering grid
           'filterType'=>GridView::FILTER_SELECT2,
        //    'filter'=>ArrayHelper::map(Potency::find()->orderBy('ID')->asArray()->all(),'ID', 'name'), 
            'filter'=>$appttypes = ['0'=>'InActive','1'=>'Active'],
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'- Type -'],
            // end filtering grid
            'editableOptions'=> function ($model, $key, $index, $widget) {
				//	$appttypes = ArrayHelper::map(Potency::find()->orderBy('ID')->asArray()->all(),'ID','name');
					$appttypes = ['0'=>'InActive','1'=>'Active'];
                    return [
                            'header' => 'Edit Status',
                            'attribute' => 'status',
                            'size' => 'sm',
                            'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                            'displayValueConfig' => $appttypes,
                            'data' => $appttypes,
							'resetButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ban-circle"></i>&nbsp;Clear'],  
							'submitButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ok"></i>&nbsp;Save'],  
                           	'formOptions' => [
								'method' => 'POST',
								'action' => Yii::$app->homeUrl.'?r=producttype/update&id='.$model->id
							],
                    ];
            }
],
   [
    'class' => 'kartik\grid\ActionColumn',
    'deleteOptions' => ['title' => 'Delete Record', 'data-toggle' => 'tooltip'],
    'headerOptions' => ['class' => 'kartik-sheet-style'],
	'template' => '{delete}', 
	],
];

echo GridView::widget([
    'id' => $action,
    'dataProvider' => $dataProvider,
 //   'filterModel' => $searchModel,
    'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
	'pjax'=>true,
    // set your toolbar
    'toolbar' =>  [

    ],
    // set export properties
    'export' => [
        'fontAwesome' => true
    ],
    // parameters from the demo form
	
    'bordered' => $bordered,
    'striped' => $striped,
    'condensed' => $condensed,
    'responsive' => $responsive,
    'hover' => $hover,
    'showPageSummary' => $pageSummary,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => $heading,
    ],
    'persistResize' => false,
    'toggleDataOptions' => ['minCount' => 10],
    'exportConfig' => $exportConfig,
    'itemLabelSingle' => $this->title,
    'itemLabelPlural' => $this->title
]);

?>

</div>
