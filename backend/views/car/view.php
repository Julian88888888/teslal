<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Car $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'condition',
            'model',
            'modification',
            'body_color',
            'interior_color',
            'distance',
            'status',
            'disks',
            'year',
            'price_usd',
            'price_rub',
            'cash_usd',
            'cash_rub',
            'leasing_usd',
            'leasing_rub',
            'seats',
            'autopilot',
            'drive',
            'hundred_km',
            'max_speed',
            'milage',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
