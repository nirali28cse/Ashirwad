<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Users */

$this->title = 'Create Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create adwrapper">

	<div class="panel panel-primary">
		<div class="panel-heading">  
		<h3 class="panel-title">
			Create Users
		</h3>
		<div class="clearfix"></div>
		</div>
	</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
