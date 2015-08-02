<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */

$this->title = 'Create Adm Menu Items';
$this->params['breadcrumbs'][] = ['label' => 'Adm Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adm-menu-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
