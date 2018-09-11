<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Potency */

$this->title = 'Create Potency';
$this->params['breadcrumbs'][] = ['label' => 'Potencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="potency-create adwrapper">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
