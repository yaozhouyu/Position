<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\XyzpPositionSubClassify */

$this->title = 'Update Xyzp Position Sub Classify: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Position Sub Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xyzp-position-sub-classify-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
