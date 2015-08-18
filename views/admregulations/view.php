<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Attachments;
use yii\data\SqlDataProvider;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Admregulations */

$this->title = 'Visualização do Documento ' . '#' . $model->id;

?>
<div class="admregulations-view">

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

        <?php  echo $this->render('_menu'); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
    <?php if ($flash = Yii::$app->session->getFlash("regulations")): ?>

    <div class="alert alert-success">
        <p><em><?= $flash ?></em></p>
    </div>

    <?php endif; ?> 
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'subcat_id',
            [ 
              'label' => 'Categoria',
              'format' => 'raw',
              'value' => $model->admMenuItems->label,
            ],            
            'name',
            'description',
            //'created',
            [ 
              'attribute' => 'created',
              'format' => 'raw',
              'value' => date("d/m/Y",  strtotime($model->created)),
            ],            
            //'updated',
            [ 
              'attribute' => 'updated',
              'format' => 'raw',
              'value' => $model->updated <> '' ? date("d/m/Y",  strtotime($model->updated)) : '',
            ],            
            'docname',
            //'is_active',
            [
             'attribute' => 'is_active',
             'format' => 'raw',
             'value' => $model->is_active == 1 ? '<span style="color:green" class="glyphicon glyphicon-ok" aria-hidden="true"></span> Sim' : '<span style="color:red" class="glyphicon glyphicon-remove" aria-hidden="true"></span> Não',
             ],
        ],
    ]) ?>
    <a name="checklist"></a>
    <h1><i class="fa fa-paperclip"></i> Anexos
    <div class="pull-right">
    <?php
    echo Html::a('<i class="fa fa-plus"></i> Anexar Arquivos', ['/attachments/create', 'id' => $model->id], ['class' => 'btn btn-success']);
    ?>
    </div>
    </h1>
    <hr/>

    <?php if ($flash = Yii::$app->session->getFlash("file-success")): ?>

        <div class="alert alert-success">
            <p class="text-center"><?= $flash ?></p>
        </div>

    <?php endif; ?>

    <?php
    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT id, regulations_id, attachlabel, attachname, created  FROM attachments WHERE regulations_id = ".$model->id." ORDER BY created DESC",
        'totalCount' => 200,
        'sort' =>false,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 200,
        ],
    ]);
    ?>

    <?php Pjax::begin(['id' => 'pjax-container']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'emptyText'    => '</br><p class="text-danger">Nenhum arquivo anexado!</p>',
        'summary'      =>  '',
        'showHeader'   => false,    
        'columns' => [
            //'attachlabel',
            //'attachname',
            [
               'attribute'=>'attachlabel',
               'format' => 'raw',
               'value'=>function ($data) {
                    return Html::a($data["attachlabel"],Yii::getAlias('@open')."/".$data["attachname"], ['target' => '_blank']);
                },
                'contentOptions'=>['style'=>'width: 60%;text-align:left'],
            ],
            [ 
              'attribute' => 'created',
              'format' => 'raw',
              'value'=>function ($data) {
                    return "Anexado em: ".date("d/m/Y",  strtotime($data["created"]));
                },
            ],  
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'controller' => 'attachments',
            'template' => '{delete}',
            'buttons' => [
                        'delete' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', '#', [
                            'title' => 'Excluir Anexo',
                            'aria-label' => 'Excluir',
                            'onclick' => "
                                if (confirm('Comfirma exclusão do anexo?')) {
                                    $.ajax('$url', {
                                        type: 'POST'
                                    }).done(function(data) {
                                        $.pjax.reload({container: '#pjax-container'});
                                    });
                                }
                                return false;
                            ",
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>
    </div>

</div>
