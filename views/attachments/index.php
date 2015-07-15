<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttachmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anexos';
?>
<div class="attachments-index">

    <h1><span><?= Html::encode($this->title) ?></span>
    <?= Html::a('Adicionar', ['create'], ['class' => 'btn btn-primary grid-button pull-right']) ?>
    </h1>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'regulations_id',
            'name',
            'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
