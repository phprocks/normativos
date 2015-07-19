<?php

namespace app\controllers;

use Yii;
use app\models\Attachments;
use app\models\AttachmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttachmentsController implements the CRUD actions for Attachments model.
 */
class AttachmentsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Attachments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttachmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attachments model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Attachments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attachments();

        //$model->status_id = 1;
        $model->created = date('Y-m-d');        

            if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $file = $model->uploadImage();
 
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($file !== false) {
                    $path = $model->getImageFile();
                    $file->saveAs($path);
                }
                Yii::$app->session->setFlash("file-success", '<i class="fa fa-check"></i> Arquivo anexado com sucesso!');
                return $this->redirect(['/admregulations/view', 'id' => $model->regulations_id, '#'=>'checklist']);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model'=>$model,
        ]);
    }

    /**
     * Updates an existing Attachments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Attachments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if (!Yii::$app->request->isAjax) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Attachments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attachments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attachments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
