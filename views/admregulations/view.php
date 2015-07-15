<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Attachments;
use yii\data\SqlDataProvider;
use yii\widgets\Pjax;

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
    <a name="checklist"></a>
    <h1><i class="fa fa-list-alt"></i> Anexos
    <div class="pull-right">

    <?php
        echo Html::a('<i class="fa fa-cloud-upload"></i> Anexar Arquivos', ['/attachments/create', 'id' => $model->id], ['class' => 'btn btn-success']);
    ?>

    </div>
    </h1>

    <?php if ($flash = Yii::$app->session->getFlash("file-success")): ?>

        <div class="alert alert-success">
            <p class="text-center"><?= $flash ?></p>
        </div>

    <?php endif; ?>

    <?php
    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT id, regulations_id, attachlabel, attachname, created  FROM attachments WHERE regulations_id = ".$model->id." ORDER BY attachname ASC",
        'totalCount' => 200,
        'sort' =>false,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 200,
        ],
    ]);
    ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'emptyText'    => '</br><p class="text-danger">Nenhum arquivo anexado!</p>',
    'summary'      =>  '',
    'showHeader'   => false,    
    'columns' => [
        //'id',
        //'regulations_id',
        'attachlabel',
        'attachname',
        'created',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

</div>
