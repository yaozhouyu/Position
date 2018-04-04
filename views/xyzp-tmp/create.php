<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\XyzpTmp */

$this->title = 'Create Xyzp Tmp';
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Tmps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xyzp-tmp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
