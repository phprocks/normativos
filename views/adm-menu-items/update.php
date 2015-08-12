<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */

$this->title = 'Alteração da Categoria ' . '#' . $model->id;
?>
<div class="adm-menu-items-update">

    <h1><?= Html::encode($this->title) ?></h1>
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
