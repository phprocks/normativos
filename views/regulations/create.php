<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Regulations */

$this->title = 'Create Regulations';
$this->params['breadcrumbs'][] = ['label' => 'Regulations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regulations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
