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
    <?= Html::a('Adicionar', ['create'], ['class' => 'btn btn-primary grid-button pull-right']) ?>
    </h1>
    <hr/>

    <div class="col-xs-6 col-md-3">
    <?php  echo $this->render('//admregulations/_menu'); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],        
        'columns' => [
            'id',
            //'name',
            'label',
            //'icon',
            'url:url',
            // 'visible',
            // 'options:ntext',
            'parent_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>

</div>
