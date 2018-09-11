<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductOut */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-out-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'buyer_user_id',
            'seller_user_id',
            'product_type_id',
            'potency_id',
            'quantity_type_id',
            'product_id',
            'total_qty',
            'notes:ntext',
            'status',
            'date_time',
        ],
    ]) ?>

</div>
