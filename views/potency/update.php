<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Potency */

$this->title = 'Update Potency: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Potencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="potency-update adwrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
