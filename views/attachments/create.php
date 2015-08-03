<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attachments */

$this->title = 'Adicionar Anexo';
?>
<div class="attachments-create">

    <h1><i class="fa fa-paperclip"></i> <?= Html::encode($this->title) ?></h1>
    <hr/>

    <div class="col-xs-6 col-md-3">
        <?php  echo $this->render('//admregulations/_menu'); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>

</div>
