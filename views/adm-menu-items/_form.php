<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adm-menu-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength'=>40,'style'=>'width:300px'])->hint('Para uso interno!') ?>

    <?= $form->field($model, 'label')->textInput(['maxlength'=>40,'style'=>'width:300px'])->hint('Nome que irá aparecer no sistema') ?>

    <?php //echo $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visible')->radioList([
        '1' => 'Sim', 
        '0' => 'Não',
        ], ['itemOptions' => ['class' =>'radio-inline','labelOptions'=>array('style'=>'padding:5px;')]])->label('Ativo') ?>

    <?php //echo $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'parent_id')->textInput() ?>
    <?=
    $form->field($model, 'parent_id', [
        'inputOptions' => [
            'class' => 'selectpicker '
        ]
    ]
    )->dropDownList(app\models\AdmMenuItems::getCat(), ['prompt' => 'Nenhum', 'class'=>'form-control required', 'style'=>'width:300px']);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
