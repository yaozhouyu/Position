<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\XyzpPosition */

$this->title = 'Update Xyzp Position: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xyzp-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
