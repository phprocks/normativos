<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admregulations */

$this->title = 'Alteração de Documento: ' . ' ' . $model->name;
?>
<div class="admregulations-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
