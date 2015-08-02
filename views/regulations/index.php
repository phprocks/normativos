<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\sidenav\SideNav;
use app\models\Category;
use app\models\Subcat;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegulationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';

?>
<div class="regulations-index">

    <h3><?= Html::encode($this->title) ?></h3>

<div class="row">
  <div class="col-md-3">
    <?php

    echo \cyneek\yii2\menu\Menu::widget([
        //'heading' => 'Options',
        'options' => ['heading' => false],
        //'class'=>'head-style',
        ]);
    ?>
    <?php
    /*
        $item = [];
        $Category = Category::find()->all();
        foreach($Category as $model) {
            $item[] = ['label' => $model->description, 'url' => '#'];
            $id = $model->id;

            $Subcat = Subcat::find()->where("category_id=$id")->all();
            foreach($Subcat as $model2) {
                $item[] = ['label' => $model2->description, 'url' => '#'];
            }
        }
 

    //  var_dump($subitem);

    echo SideNav::widget([
        'items' => $item,
        //'type' => SideNav::TYPE_DEFAULT,
        //'heading' => 'Options',
        // 'items' => [
        //     [
        //         'url' => '#',
        //         'label' => 'Category One',
        //         'items' => [
        //             ['label' => 'Sub-Category 1.1', 'url'=>'#'],
        //             ['label' => 'Sub-Category 1.2', 'url'=>'#'],
        //         ],
        //     ],
        //     [
        //         'label' => 'Category Two',
        //         'items' => [
        //             ['label' => 'Sub-Category 2.1', 'url'=>'#'],
        //             ['label' => 'Sub-Category 2.2', 'url'=>'#'],
        //         ],
        //     ],
        // ],
    ]);    
    */  
    ?>
  </div>
  <div class="col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading"><b>Pesquisar</b></div>
      <div class="panel-body">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-bordered'],
        'emptyText'    => '</br><p class="text-info">Nenhum documento encontrado!</p>',   
        'summary' => "<p class=\"text-info pull-right\"><h5>Resultado: {totalCount} documento(s)</h5></p>",         
        'columns' => [
            [
             'attribute' => 'subcat_id',
             'enableSorting' => true,
             'contentOptions'=>['style'=>'width: 5%;text-align:left'],
            ],            
            [
             'attribute' => 'name',
             'enableSorting' => true,
             'contentOptions'=>['style'=>'width: 20%;text-align:left'],
            ], 
            [
             'attribute' => 'description',
             'enableSorting' => true,
             'contentOptions'=>['style'=>'width: 30%;text-align:left'],
            ],            
            [
             'attribute' => 'created',
             'enableSorting' => true,
             'contentOptions'=>['style'=>'width: 5%;text-align:center'],
             'format' => ['date', 'php:d/m/Y'],
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'header'=> 'Ações',
            'contentOptions'=>['style'=>'width: 3%;text-align:center'],
            'template' => '{open} {attachments} {info}',
                'buttons' => [
                    'open' => function ($url, $model) {
                        return $model->is_active <> 0 ? Html::a('<span class="glyphicon glyphicon-open-file" ></span>', Yii::getAlias('@open')."/".$model->docname, [
                                    'title' => 'Abrir',
                                    'target' => '_blank'
                        ]): '';
                    },
                    'attachments' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-paperclip" ></span>',['list','id'=>$model->id],[
                                                    'data-toggle'=>"modal",
                                                    'data-target'=>"#myModal",
                                                    'data-title'=>"Anexos",
                                                    ]);
                    },
                    // 'info' => function ($url, $model) {
                    //         return Html::a('<span class="glyphicon glyphicon-info-sign" ></span>',['list','id'=>$model->id],[
                    //                                 'data-toggle'=>"modal",
                    //                                 'data-target'=>"#myModal",
                    //                                 'data-title'=>"Informação",
                    //                                 ]);
                    // },                    
                    // 'attachments' => function ($url, $model) {
                    //         return $model->is_active <> 0 ?  Html::a('<span class="glyphicon glyphicon-paperclip" ></span>', $url, [
                    //                     'title' => 'Anexos',
                    //                     //'class'=>'btn btn-primary btn-xs',                                
                    //     ]) : '';
                    // },
                ],

            ],
        ],
    ]); ?>

    <?php
    Modal::begin([
        'id' => 'myModal',
        'header' => '<h3 class="modal-title">Anexos</h3>',
    ]);
     
    echo '...';
     
    Modal::end();

    $this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title') 
        var href = button.attr('href') 
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");

    // echo Html::a('teste',['create','group_id'=>8],[
    //                                                 'data-toggle'=>"modal",
    //                                                 'data-target'=>"#myModal",
    //                                                 'data-title'=>"Detail Data",
    //                                                 ]);
    ?>
  </div>
</div>

</div>
