<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\XyzpPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xyzp Positions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xyzp-position-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Xyzp Position', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'resume',
            // 'city',
            // 'info_id',
            [
                'attribute'=>'info_id',
                'value'=>'infos.title',
            ],
            'company_id',
            'create_time',
            //'update_time',
            //'sort',
            //'is_deleted',
            //'content_offset',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
