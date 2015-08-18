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
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<em>Nenhum<em>'],
        'attributes' => [
            'id',
            'name',
            'label',
            'parent_id',
            [
             'attribute' => 'visible',
             'format' => 'raw',
             'value' => $model->visible == 1 ? '<span style="color:green" class="glyphicon glyphicon-ok" aria-hidden="true"></span> Sim' : '<span style="color:red" class="glyphicon glyphicon-remove" aria-hidden="true"></span> Não',
             ],                        
        ],
    ]) ?>
    </div>

</div>
