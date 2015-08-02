<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdmregulationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão dos Documentos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admregulations-index">

    <h1><span><?= Html::encode($this->title) ?></span>
    <?= Html::a('Adicionar', ['create'], ['class' => 'btn btn-primary grid-button pull-right']) ?>
    </h1>
    <hr/>

    <div class="col-xs-6 col-md-3">

        <?php  echo $this->render('_menu'); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'columns' => [
            'id',
            'subcat_id',
            'name',
            'description',
            [ 
            'attribute' => 'is_active',
            'format' => 'raw',
            'value' => function ($model) {                      
                    //return $model->status->name;
                    return $model->is_active == 1 ? '<span style="color:green" class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span style="color:red" class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
                    },
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            // [
            // 'class' => 'yii\grid\ActionColumn',
            // 'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            // 'template' => '{attachments}',
            // 'controller' => 'attachments',
            //     'buttons' => [
            //         'attachments' => function ($url, $model) {
            //             //$url = Url::toRoute('attachments');
            //                 return $model->is_active <> 0 ?  Html::a('<span class="glyphicon glyphicon-paperclip" ></span>', $url, [
            //                             'title' => 'Anexos',
            //                             //'class'=>'btn btn-primary btn-xs',                                
            //             ]) : '';
            //         },
            //     ],
            // ],
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 10%;text-align:right'],
            ],
        ],
    ]); ?>    
    </div>
</div>
