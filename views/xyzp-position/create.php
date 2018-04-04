<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\XyzpPosition */

$this->title = 'Create Xyzp Position';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xyzp-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
