<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\XyzpTmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xyzp-tmp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'class')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'subclass')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
