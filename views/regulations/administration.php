<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
$this->title = 'Administração';
?>
<div class="site-about">
    <h2><?= Html::encode($this->title) ?></h2>
    <hr/>
<p><?php echo Html::a('Gestão dos Documentos', ['/admregulations/index']);?></p>
<p><?php echo Html::a('Gestão das Categorias', ['/category/index']);?></p>
<p><?php echo Html::a('Gestão dos Tipos (subcategorias)', ['/subcat/index']);?></p>

</div>
