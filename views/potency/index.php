<style>
#potency-name-cont{
    display: flow-root;
    padding-bottom: 10px;
}
</style>




<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Potency;
use yii\helpers\ArrayHelper;
use \kartik\editable\Editable;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PotencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Potency';
$action = 'potency';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="potency-index adwrapper">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


	<?php /* GridView::widget([
     //   'export'=>false,
	    'id' => 'potency',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'idPolling',
            'namaPolling',
            'statusPolling',
            'tanggalBuka',
            'tanggalTutup',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); */

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
				'action' => Yii::$app->homeUrl.'?r='.$action.'/create'
			],
	'ajaxSettings' => [ 'success' => new \yii\web\JsExpression('function(html)
            {
				//	alert("Potency added successfully.");
					window.location = "'.Yii::$app->homeUrl.'?r='.$action.'";
            }')
			],
]);
$form = $editable->getForm();

$editable->afterInput = 
   // $form->field($model, 'name')->textInput(['placeholder'=>'Enter zip code...']) . "\n";
    // $form->field($model, 'status')->textInput(['placeholder'=>'Enter zip code...']);
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
// Column with radio selection 
/* [
    'class' => 'kartik\grid\RadioColumn',
    'width' => '36px',
    'headerOptions' => ['class' => 'kartik-sheet-style'],
], */

// column with expend 
/* [
    'class' => 'kartik\grid\ExpandRowColumn',
    'width' => '50px',
    'value' => function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($model, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expand-row-details', ['model' => $model]);
    },
    'headerOptions' => ['class' => 'kartik-sheet-style'] ,
    'expandOneOnly' => true
], */
/*  [
    'attribute' => 'id', 
    'vAlign' => 'middle',
    'width' => '50px',
],  */
[
    'class' => 'kartik\grid\EditableColumn',
    'attribute' => 'name',
  //  'pageSummary' => 'Total',
    'vAlign' => 'middle',
    'width' => '210px',
/*     'readonly' => function($model, $key, $index, $widget) {
        return (!$model->status); // do not allow editing of inactive records
    }, */
	'editableOptions' => function ($model, $key, $index) {
		return [
			'resetButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ban-circle"></i>&nbsp;Clear'],  
			'submitButton' => ['class'=>'btn btn-sm btn-primary','icon' => '<i class="glyphicon glyphicon-ok"></i>&nbsp;Save'],  
			'formOptions' => [
				'method' => 'POST',
				'action' => Yii::$app->homeUrl.'?r=potency/update&id='.$model->id
			],
			'options' => [
				'id' => $index . '_' . $model->id,
			]
		];
	},
],


/* [
    'attribute' => 'author_id', 
    'vAlign' => 'middle',
    'width' => '180px',
    'value' => function ($model, $key, $index, $widget) { 
        return Html::a($model->author->name,  
            '#', 
            ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
    },
    'filterType' => GridView::FILTER_SELECT2,
    'filter' => ArrayHelper::map(Author::find()->orderBy('name')->asArray()->all(), 'id', 'name'), 
    'filterWidgetOptions' => [
        'pluginOptions' => ['allowClear' => true],
    ],
    'filterInputOptions' => ['placeholder' => 'Any author'],
    'format' => 'raw'
], 
[
    'class' => 'kartik\grid\EditableColumn',
    'attribute' => 'publish_date',    
    'hAlign' => 'center',
    'vAlign' => 'middle',
    'width' => '9%',
    'format' => 'date',
    'xlFormat' => "mmm\\-dd\\, \\-yyyy",
    'headerOptions' => ['class' => 'kv-sticky-column'],
    'contentOptions' => ['class' => 'kv-sticky-column'],
    'readonly' => function($model, $key, $index, $widget) {
        return (!$model->status); // do not allow editing of inactive records
    },
    'editableOptions' => [
        'header' => 'Publish Date', 
        'size' => 'md',
        'inputType' => \kartik\editable\Editable::INPUT_WIDGET,
        'widgetClass' =>  'kartik\datecontrol\DateControl',
        'options' => [
            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'displayFormat' => 'dd.MM.yyyy',
            'saveFormat' => 'php:Y-m-d',
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]
        ]
    ],
],*/

/* [
    'class' => 'kartik\grid\EditableColumn',
    'attribute' => 'buy_amount', 
    'readonly' => function($model, $key, $index, $widget) {
        return (!$model->status); // do not allow editing of inactive records
    },
	
    'editableOptions' => [
        'header' => 'Buy Amount', 
        'inputType' => \kartik\editable\Editable::INPUT_SPIN,
        'options' => [
            'pluginOptions' => ['min' => 0, 'max' => 5000]
        ]
    ],
    'hAlign' => 'right', 
    'vAlign' => 'middle',
    'width' => '7%',
    'format' => ['decimal', 2],
    'pageSummary' => true
], */

/* 
[
    'attribute' => 'sell_amount', 
    'vAlign' => 'middle',
    'hAlign' => 'right', 
    'width' => '7%',
    'format' => ['decimal', 2],
    'pageSummary' => true
], */

/* 
[
    'class' => 'kartik\grid\FormulaColumn', 
    'header' => 'Buy + Sell<br>(BS)', 
    'vAlign' => 'middle',
    'value' => function ($model, $key, $index, $widget) { 
        $p = compact('model', 'key', 'index');
        return $widget->col(7, $p) + $widget->col(8, $p);
    },
    'headerOptions' => ['class' => 'kartik-sheet-style'],
    'hAlign' => 'right', 
    'width' => '7%',
    'format' => ['decimal', 2],
    'mergeHeader' => true,
    'pageSummary' => true,
    'footer' => true
], */

/* 
[
    'class' => 'kartik\grid\FormulaColumn', 
    'header' => 'Buy %<br>(100 * B/BS)', 
    'vAlign' => 'middle',
    'hAlign' => 'right', 
    'width' => '7%',
    'value' => function ($model, $key, $index, $widget) { 
        $p = compact('model', 'key', 'index');
        return $widget->col(9, $p) != 0 ? $widget->col(7, $p) * 100 / $widget->col(9, $p) : 0;
    },
    'format' => ['decimal', 2],
    'headerOptions' => ['class' => 'kartik-sheet-style'],
    'mergeHeader' => true,
    'pageSummary' => true,
    'pageSummaryFunc' => GridView::F_AVG,
    'footer' => true
], */

/* 
[
    'class' => 'kartik\grid\BooleanColumn',
    'attribute' => 'status', 
    'vAlign' => 'middle'
],  */

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
								'action' => Yii::$app->homeUrl.'?r=potency/update&id='.$model->id
							],
                    ];
            }
],

 [
    'class' => 'kartik\grid\ActionColumn',
/*     'dropdown' => $this->dropdown,
    'dropdownOptions' => ['class' => 'pull-right'],
    'urlCreator' => function($action, $model, $key, $index) { return '#'; }, 
    'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
    'updateOptions' => ['title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'], */
    'deleteOptions' => ['title' => 'Delete Record', 'data-toggle' => 'tooltip'],
    'headerOptions' => ['class' => 'kartik-sheet-style'],
	'template' => '{delete}', 
/* 	'template' => '{delete}{my_button}', 
	'buttons' => [
		'my_button' => function ($url, $model, $key) {
			return Html::a('My Action', ['my-action', 'id'=>$model->id]);
		},
	]	 */
],
/* [
    'class' => 'kartik\grid\CheckboxColumn',
    'headerOptions' => ['class' => 'kartik-sheet-style'],
], */
];

echo GridView::widget([
    'id' => $action,
    'dataProvider' => $dataProvider,
   // 'filterModel' => $searchModel,
    'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
   //  'pjax' => false, // pjax is set to always true for this demo
	'pjax'=>true,

    // set your toolbar
    'toolbar' =>  [
/*         ['content' => 
            Html::button('<i class="glyphicon glyphicon-plus"></i> Add Potency', ['type' => 'button', 'title' => 'Add Potency', 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
        ], */
    //    '{export}',
    //    '{toggleData}',
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
