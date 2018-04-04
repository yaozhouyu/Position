<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\XyzpClassifyKey */

$this->title = 'Update Xyzp Classify Key: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Classify Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xyzp-classify-key-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
