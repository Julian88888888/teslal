<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Car $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'condition')->dropDownList([
        'new' => 'Новая',
        'used' => 'С пробегом'
    ], [
        'class' => 'form-select', 
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        30 => 'В наличии', 
        40 => 'В пути', 
        50 => 'Под заказ'
    ], [
        'class' => 'form-select', 
    ]) ?>

    <?= $form->field($model, 'model')->dropDownList([
        'model_s' => 'Model S',
        'model_3' => 'Model 3',
        'model_x' => 'Model X',
        'model_y' => 'Model Y',
        'cybertruck' => 'Cybertruck',
        'roadster' => 'Roadster',
    ], [
        'class' => 'form-select',
        'prompt' => '' 
    ]) ?>

    <?= $form->field($model, 'modification')->dropDownList([
        
    ], [
        'class' => 'form-select', 
        'disabled' => true,
    ]) ?>

    <?= $form->field($model, 'body_color')->dropDownList([
        
    ], [
        'class' => 'form-select', 
        'disabled' => true,
    ]) ?>

    <?= $form->field($model, 'interior_color')->dropDownList([
        
    ], [
        'class' => 'form-select', 
        'disabled' => true,
    ]) ?>

    <?= $form->field($model, 'year')->dropDownList([
        
    ], [
        'class' => 'form-select', 
        'disabled' => true,
    ]) ?>

    <hr>
    <h3>Цены</h3>

    <?= $form->field($model, 'cash_usd')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cash_rub')->textInput(['maxlength' => true]) ?>
    
    <br>

    <?= $form->field($model, 'price_usd')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price_rub')->textInput(['maxlength' => true]) ?>
    
    <br>

    <?= $form->field($model, 'leasing_usd')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'leasing_rub')->textInput(['maxlength' => true]) ?>

    <hr>
    <h3>Характеристики</h3>

    <?= $form->field($model, 'disks')->dropDownList([
        16, 17, 18, 19, 20, 21, 22, 23, 24
    ], [
        'class' => 'form-select', 
        'disabled' => false,
    ]) ?>

    <?= $form->field($model, 'seats')->dropDownList([
        
    ], [
        'class' => 'form-select', 
        'disabled' => true,
        'prompt'=>''
    ]) ?>

    <?= $form->field($model, 'autopilot')->dropDownList([
        'basic' => 'Базовый',
        'advanced' => 'Продвинутый',
        'complete' => 'Полный'
    ], [
        'class' => 'form-select', 
        'disabled' => false,
    ]) ?>

    <?= $form->field($model, 'drive')->dropDownList([
        'full' => 'Полный',
        'forward' => 'Передний',
        'backward' => 'Задний'
    ], [
        'class' => 'form-select', 
        'disabled' => false,
    ]) ?>

    <?= $form->field($model, 'hundred_km')->textInput(['maxlength' => true])->label('0-100 км/ч (укажите количество секунд)') ?>

    <?= $form->field($model, 'max_speed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distance')->textInput(['maxlength' => true])->label('Запас хода (км)')  ?>

    <?= $form->field($model, 'milage')->textInput(['maxlength' => true])->label('Пробег (км)')  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php
        Yii::$app->view->registerJs('var usd_course = "'. $usd_course.'"',  \yii\web\View::POS_HEAD);
    ?>
</div>
