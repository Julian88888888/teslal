<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Presentation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="presentation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->textInput() ?>

    <?= $form->field($model, 'is_constructor')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interior_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_usd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_nds_usd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cash_usd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leasing_usd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
