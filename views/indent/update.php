<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indent */

$this->title = 'Update Indent: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Indents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indent-update adwrapper">

	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			<?= Html::encode($this->title) ?>
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
