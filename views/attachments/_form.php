<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <!-- Inicio Form -->
    <div class="col-xs-6">
		<div class="attachments-form">

	    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

		<?php

	    $t = Yii::$app->getRequest()->getQueryParam('id');

	    ?>

	    <?= Html::activeHiddenInput($model, 'regulations_id', ['value' => $t]) ?>

	    <?= $form->field($model, 'attachlabel')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'file')->fileInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

		</div>
	</div>
    <!-- Inicio Informativo -->
    <div class="col-xs-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <ul>
                  <li>O tamanho limite do arquivo é de <b>5 MB</b>.</li></p>
                  <li>São permitidos arquivos com extensões do tipo:</li>  
                  <ul>
                  	<li><b>Acrobat Reader</b> (PDF)</li>
                  	<li><b>Microsoft Word</b> (DOC e DOCX)</li>
                  	<li><b>Microsoft Excel</b> (XLS e XLSX)</li>
                  </ul>
                </ul>
              </div>
            </div>
    </div>
</div>
