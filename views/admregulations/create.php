<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Admregulations */

$this->title = 'Novo Documento';
?>
<div class="admregulations-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
