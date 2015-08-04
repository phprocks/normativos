<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AdmMenuItems;

/* @var $this yii\web\View */
/* @var $model app\models\Admregulations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admregulations-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?php // $form->field($model, 'subcat_id')->textInput() ?>
    <?= $form->field($model, 'subcat_id')->dropDownList(ArrayHelper::map(AdmMenuItems::find()->where(['visible' => 1, 'parent_id' => null])->orderBy("label ASC")->all(), 'id', 'label'),['prompt'=>'-- Selecione --'])  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength'=>10,'style'=>'width:300px']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength'=>10,'style'=>'width:600px']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'is_active')->radioList([
        '1' => 'Sim', 
        '0' => 'Não',
        ], ['itemOptions' => ['class' =>'radio-inline','labelOptions'=>array('style'=>'padding:5px;')]])->label('Ativo') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
