<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AdmMenuItems */

$this->title = 'Categoria ' . '#' . $model->id;
?>
<div class="adm-menu-items-view">

    <h1><span><?= Html::encode($this->title) ?></span>
    <div class="pull-right">
        <?= Html::a('<i class="fa fa-pencil-square-o"></i> Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-times"></i> Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </h1>
    <hr/>

    <div class="col-xs-6 col-md-3">
        <?php  echo $this->render('//admregulations/_menu'); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'label',
            'icon',
            'url:url',
            'visible',
            'options:ntext',
            'parent_id',
        ],
    ]) ?>
    </div>

</div>
