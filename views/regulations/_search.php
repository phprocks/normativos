<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'name')->textInput(array('placeholder' => 'Nome'))->label(''); ?>

    <?= $form->field($model, 'created')->textInput(array('placeholder' => 'Publicação'))->label(''); ?>

            <div class="form-group">
                <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>

</div>
