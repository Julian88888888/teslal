<?php

use common\models\Presentation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PresentationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Presentations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php // echo Html::a(Yii::t('app', 'Create Presentation'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'car_id',
                'value' => function($model) {
                    return $model->car_id ? '<a href="/admin/car/view/?id='.$model->car_id.'" target="_blank">'.$model->car_id.'</a>': '';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->created_at);
                }
            ],
            'model',
            'modification',
            [
                'attribute' => 'is_constructor',
                'value' => function($model) {
                    return $model->is_constructor ? 'Да' : 'Нет';
                }
            ],
            //'body_color',
            //'interior_color',
            //'disks',
            //'year',
            //'price_usd',
            //'price_nds_usd',
            //'cash_usd',
            //'leasing_usd',
            //'created_at',
            //'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'header'=>'',
                'template' => '{delete}',
                'visibleButtons'=>[
                    'view'=> function($model){
                          return $model->status!=1;
                     },
                ]
            ],
        ],
    ]); ?>


</div>
