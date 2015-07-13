<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdmregulationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestão dos Documentos';
?>
<div class="admregulations-index">

    <h1><span><?= Html::encode($this->title) ?></span>
    <?= Html::a('Adicionar', ['create'], ['class' => 'btn btn-primary grid-button pull-right']) ?>
    </h1>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'columns' => [
            'id',
            'subcat_id',
            'name',
            'description',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
