<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Car $model */
/** @var yii\widgets\ActiveForm $form */
?>


<!-- the jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

<!-- bootstrap 5.x or 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
 
<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
 
<!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
<!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->
 
<!-- the fileinput plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
 
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->

 
<!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
     preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed 
     correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
     selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you 
     do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
     and some basic file content parsing signatures. -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.js" type="text/javascript"></script>
 
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
 
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
 
<!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 
<!-- the main fileinput plugin script JS file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
 
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
<!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->
 
<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/ru.js"></script>





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

    <hr>
    <h3>Дополнительные фото</h3>

    <?= $form->field($upload, 'image[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <br>
    <br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <?php
        Yii::$app->view->registerJs('var usd_course = "'. $usd_course.'"',  \yii\web\View::POS_HEAD);
    ?>
</div>


<script>
    $("#uploadform-image").fileinput(
        {
            // 'showUpload':false, 
            maxFileCount: 15,
            validateInitialCount: true,
            allowedFileExtensions: ["jpg", "png"],
            language: 'ru',
            previewFileType:'any', 
            initialPreview: [
                <?php 
                if(isset($images)) {
                    foreach ($images as $image) {
                        echo "\"<img src='/uploads/".$image->filename."' class='file-preview-image'>\",";
                    }
                }
                ?>
            ],
            initialPreviewConfig: [
                <?php 
                if(isset($images)) {
                    foreach ($images as $image) {
                        echo "{ 
                            key:".$image->id.", url:'/admin/car/delete-image?id=".$image->id."', caption:'".$image->filename."'".
                        "},";
                    }
                }
                ?>
            ],
            overwriteInitial: false,
            uploadUrl: '/admin/car/upload-image?id=<?= $model->id ?>',
            uploadExtraData: {
            },
            // deleteUrl: '/admin/car/delete-image',
            fileActionSettings: {
                showDrag: false,
                // showDelete: false,
                showZoom: false,
                showRotate: false
            },
            // initialPreviewShowDelete: false,
            showRemove: false
        }
    );
</script>
