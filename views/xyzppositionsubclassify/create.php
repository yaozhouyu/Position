<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\XyzpPositionSubClassify */

$this->title = 'Create Xyzp Position Sub Classify';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Position Sub Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xyzp-position-sub-classify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
