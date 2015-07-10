<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\sidenav\SideNav;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegulationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regulations';

?>
<div class="regulations-index">

    <h3><?= Html::encode($this->title) ?></h3>

<div class="row">
  <div class="col-md-3">
    <?php
    echo SideNav::widget([
        'type' => SideNav::TYPE_DEFAULT,
        //'heading' => 'Options',
        'items' => [
            [
                'url' => '#',
                'label' => 'Categoria 1',
                //'icon' => 'home'
            ],
            [
                'label' => 'Help',
                //'icon' => 'question-sign',
                'items' => [
                    ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                    ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                ],
            ],
        ],
    ]);      
    ?>
  </div>
  <div class="col-md-9">
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum documento encontrado!</p>',   
        'summary' => "<p class=\"text-info \">{totalCount} documentos</p>",         
        'columns' => [
            //'id',
            'subcat_id',
            'name',
            'description',
            'created',
            'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>

</div>
