<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegulationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regulations-search">

    <?php $form = ActiveForm::begin([
        'options' => [
                    'class' => 'form-inline',
                    ],
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Nome','maxlength'=>10,'style'=>'width:300px'])->label(''); ?>

    <?= $form->field($model, 'created')->textInput(['placeholder' => 'Publicação','maxlength'=>10,'style'=>'width:150px'])->label(''); ?>

            <div class="form-group">
                <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-success']) ?>
                <p class="help-block help-block-error"></p>
            </div>

    <?php ActiveForm::end(); ?>

</div>
