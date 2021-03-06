<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\XyzpTmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '校园招聘职位分类检查 - 复审';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="xyzp-tmp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,

        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id',
                'options'=>['width' => '80px'],
            ],
            [
                'label' => '职位名称',
                'attribute' => 'position',
                'options' => ['width' => '150px']
            ],
            
            [
                'label' => '涉及单位',
                'attribute' => 'company',
                'format'=>'raw',
                'value'=> function($data){
                    $infos = explode(',' ,$data->info_id);
                    $comps = explode(',' ,$data->company);
                    $str = '';
                    foreach ($infos as $k => $v) 
                    {
                        $str .= "<a href='https://xyzp.haitou.cc/article/".$v.".html' target='_blank'>".$comps[$k]."</a><br>";
                    }
                    return $str;
                },
                'options' => ['width' => '300px']
            ],
            
            [
                'label' => '所属大类',
                'attribute' => 'class',
            ],
            
            [
                'label' => '所属子类',
                'attribute' => 'subclass',
            ],

            [
                'label' => '分类正误',
                'attribute' => 'op',
                'format' => 'raw',
                'value' => function($model){
                    $id = $model->id;
                    
                    if($model->op){
                        $re = $model->op;
                    }else{
                        $re = $model->op1 == $model->op2 ? 1 : 2;
                    }
                    
                    return $re == 1 ? "<button style='border:0; width:80px; color:#fff; background:#009966;' id={$id}>√ 正确</button>" : "<button style='border:0; width:80px; color:#fff; background:#FF6666' id={$id}>× 错误</button>";
                },
                'options' => ['width' => '120px'],
            ]
        ],
    ]); ?>

    <?= Html::jsFile('@web/js/jquery-1.10.1.min.js') ?>
    <script type="text/javascript">
        var btn = $('tr').children('td').children('button');

        btn.click(function(){
            var id = $(this).attr('id');

            $.ajax({
                url: '/index.php?r=xyzp-tmp/alter',
                type: 'post',
                data: {'id': id, 'op': 'op'},
                success: function (data){
                    if(data == 200) {
                        location.reload();
                    }else{
                        alert('操作失败！');
                    } 
                }
            });    
        });
    </script>
</div>
