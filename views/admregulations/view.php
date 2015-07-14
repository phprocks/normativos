<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admregulations */

$this->title = $model->name;

?>
<div class="admregulations-view">

    <h1><span><?= Html::encode($this->title) ?></span>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary pull-right']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger pull-right',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir?',
                'method' => 'post',
            ],
        ]) ?>
    </h1>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subcat_id',
            'name',
            'description',
            'created',
            'updated',
            'docname',
            //'is_active',
            [
             'attribute' => 'is_active',
             'format' => 'raw',
             'value' => $model->is_active == 1 ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Sim' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Não',
             ],
        ],
    ]) ?>

</div>
