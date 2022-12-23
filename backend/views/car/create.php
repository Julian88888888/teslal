<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Car $model */

$this->title = Yii::t('app', 'Create Car');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usd_course' => $usd_course
    ]) ?>

</div>
