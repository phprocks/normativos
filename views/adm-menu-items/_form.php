<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AdmMenuItems;

/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adm-menu-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength'=>40,'style'=>'width:300px'])->hint('Apenas para uso interno, use palavras simples e sem acentos') ?>

    <?php echo $form->field($model, 'label')->textInput(['maxlength'=>40,'style'=>'width:300px'])->hint('Título da categoria que será exibido') ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visible')->radioList([
        '1' => 'Sim', 
        '0' => 'Não',
        ], ['itemOptions' => ['class' =>'radio-inline','labelOptions'=>array('style'=>'padding:5px;')]])->label('Ativo') ?>

    <?php //echo $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'parent_id')->textInput() ?>

    <?php
    // echo $form->field($model, 'parent_id', [
    //     'inputOptions' => [
    //         'class' => 'selectpicker '
    //     ]
    // ]
    // )->dropDownList(app\models\AdmMenuItems::getCat(), ['prompt' => 'Selecione', 'class'=>'form-control required', 'style'=>'width:300px']);
    ?>

    <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(AdmMenuItems::find()->where(['parent_id' => null])->orderBy("label ASC")->all(), 'id', 'label'),['prompt'=>'-- Nenhum --','style'=>'width:300px'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
