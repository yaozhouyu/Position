<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\XyzpClassifyKey */

$this->title = 'Create Xyzp Classify Key';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Classify Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xyzp-classify-key-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
