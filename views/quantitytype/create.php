<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuantityType */

$this->title = 'Create Quantity Type';
$this->params['breadcrumbs'][] = ['label' => 'Quantity Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quantity-type-create adwrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
