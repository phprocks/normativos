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

    <?= $form->field($model, 'name')->textInput(['maxlength'=>40,'style'=>'width:150px'])->hint('Para uso interno! Utilize apenas uma palavra, sem espaços ou caracteres especiais') ?>

    <?= $form->field($model, 'label')->textInput(['maxlength'=>40,'style'=>'width:300px'])->hint('Nome que irá aparecer no sistema') ?>

    <?php //echo $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'url')->dropDownList(ArrayHelper::map(AdmMenuItems::find()->where(['parent_id' => null])->orderBy("name ASC")->all(), 'id', 'id'),['prompt'=>'Nenhum','style'=>'width:300px'])->hint('Ao selecionar uma categoria, o item criado será considerado uma subcategoria')  ?>

    <?= $form->field($model, 'visible')->radioList([
        '1' => 'Sim', 
        '0' => 'Não',
        ], ['itemOptions' => ['class' =>'radio-inline','labelOptions'=>array('style'=>'padding:5px;')]])->label('Ativo') ?>

    <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(AdmMenuItems::find()->where(['parent_id' => null])->orderBy("name ASC")->all(), 'id', 'label'),['prompt'=>'Nenhum','style'=>'width:300px'])->hint('Ao selecionar uma categoria, o item criado será considerado uma subcategoria')  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar Alteração', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
