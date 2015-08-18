<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdmMenuItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão das Categorias';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adm-menu-items-index">

    <h1><span><?= Html::encode($this->title) ?></span>
    <?= Html::a('<i class="fa fa-plus"></i> Adicionar', ['create'], ['class' => 'btn btn-success grid-button pull-right']) ?>
    </h1>
    <hr/>

    <div class="col-xs-6 col-md-3">
    <?php  echo $this->render('//admregulations/_menu'); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">
    <?php if ($flash = Yii::$app->session->getFlash("category")): ?>

    <div class="alert alert-success">
        <p><em><?= $flash ?></em></p>
    </div>

    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover '],
        'emptyText'    => '</br><p class="text-info">Nenhum documento encontrado!</p>',   
        'summary' => "<p class=\"text-info pull-right\"><h5>Quantidade de categorias: {totalCount}</h5></p>", 
        'columns' => [
            'id',
            //'name',
            'label',
            //'icon',
            //'url:url',
            // 'visible',
            // 'options:ntext',
            'parent_id',           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>

</div>
