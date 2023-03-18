<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PresentationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="presentation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'car_id') ?>

    <?php // echo $form->field($model, 'is_constructor') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'modification') ?>

    <?php // echo $form->field($model, 'body_color') ?>

    <?php // echo $form->field($model, 'interior_color') ?>

    <?php // echo $form->field($model, 'disks') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'price_usd') ?>

    <?php // echo $form->field($model, 'price_nds_usd') ?>

    <?php // echo $form->field($model, 'cash_usd') ?>

    <?php // echo $form->field($model, 'leasing_usd') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
