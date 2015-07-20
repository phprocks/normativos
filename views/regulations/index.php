<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\sidenav\SideNav;
use app\models\Category;
use app\models\Subcat;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegulationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';

?>
<div class="regulations-index">

    <h3><?= Html::encode($this->title) ?></h3>

<div class="row">
  <div class="col-md-3">
    <?php

    echo \cyneek\yii2\menu\Menu::widget([
        //'heading' => 'Options',
        //'type' => SideNav::TYPE_DEFAULT,
        'class'=>'head-style',
        ]);

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
    ?>
  </div>
  <div class="col-md-9">
    <h3>Pesquisar</h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum documento encontrado!</p>',   
        'summary' => "<p class=\"text-info pull-right\"><h3>Resultado</h3> {totalCount} documento(s)</p>",         
        'columns' => [
            'subcat_id',
            'name',
            'description',
            'created',
            'updated',
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            'template' => '{open} {attachments}',
                'buttons' => [
                    'open' => function ($url, $model) {
                        return $model->is_active <> 0 ? Html::a('<span class="glyphicon glyphicon-open-file" ></span>', $url, [
                                    'title' => 'Abrir',
                        ]): '';
                    },
                    'attachments' => function ($url, $model) {
                            return $model->is_active <> 0 ?  Html::a('<span class="glyphicon glyphicon-paperclip" ></span>', $url, [
                                        'title' => 'Anexos',
                                        //'class'=>'btn btn-primary btn-xs',                                
                        ]) : '';
                    },
                ],

            ],
        ],
    ]); ?>
  </div>
</div>

</div>
