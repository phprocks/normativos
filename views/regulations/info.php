<?php
// List the attachments in modal window
use yii\helpers\Html;

use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Attachments;
use app\models\AttachmentsSearch;
use yii\data\SqlDataProvider;


/* @var $this yii\web\View */
/* @var $model app\models\Regulations */

$this->title = 'Anexos';
?>
<div class="regulations-create">

<?php

	$id = Yii::$app->getRequest()->getQueryParam('id');

    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT id, regulations_id, attachlabel, attachname  FROM attachments WHERE regulations_id = ".$id." ORDER BY attachlabel ASC",
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
            [
               'attribute'=>'attachment',
               'format' => 'raw',
               'value'=>function ($data) {
                    return Html::a($data["attachlabel"], Yii::getAlias('@open')."/".$data["attachname"], ['target' => '_blank']);
                },
            ],
    	],
    ]); ?>

</div>
