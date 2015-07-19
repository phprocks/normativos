<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attachments */

$this->title = 'Adicionar Anexo';
?>
<div class="attachments-create">

    <h1><i class="fa fa-paperclip"></i> <?= Html::encode($this->title) ?></h1>
    <hr/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
