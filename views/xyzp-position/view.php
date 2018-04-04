<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\XyzpPosition */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Xyzp Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xyzp-position-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'resume',
            'city',
            'info_id',
            'company_id',
            'create_time',
            'update_time',
            'sort',
            'is_deleted',
            'content_offset',
        ],
    ]) ?>

</div>
