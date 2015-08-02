<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */

$this->title = 'Update Adm Menu Items: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Adm Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adm-menu-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
