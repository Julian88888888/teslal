<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Presentation $model */

$this->title = Yii::t('app', 'Create Presentation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
