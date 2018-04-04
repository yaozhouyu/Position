<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\XyzpPositionSubClassify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xyzp-position-sub-classify-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'info_id')->textInput() ?>

    <?= $form->field($model, 'class')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
