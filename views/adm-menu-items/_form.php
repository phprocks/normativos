<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adm-menu-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visible')->radioList([
        '1' => 'Sim', 
        '0' => 'Não',
        ], ['itemOptions' => ['class' =>'radio-inline','labelOptions'=>array('style'=>'padding:5px;')]])->label('Ativo') ?>

    <?php //echo $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
