<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QuantityType */

$this->title = 'Update Quantity Type: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Quantity Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quantity-type-update adwrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
