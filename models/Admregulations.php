<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "regulations".
 *
 * @property integer $id
 * @property integer $subcat_id
 * @property string $name
 * @property string $description
 * @property string $created
 * @property string $updated
 * @property string $file
 * @property integer $is_active
 *
 * @property Attachments[] $attachments
 * @property Subcat $subcat
 */
class Admregulations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regulations';
    }

    public $file;
    public $filename;
    
    public function rules()
    {
        return [
            [['subcat_id', 'name', 'description', 'docname', 'is_active'], 'required'],
            [['subcat_id', 'is_active'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['file', 'filename'], 'safe'],
            [['name', 'description'], 'string', 'max' => 100],
             [['file'], 'file', 'extensions' => 'pdf, jpg', 'maxSize' => 1024 * 1024 * 4, 'tooBig' => 'Arquivo acima do limite de 500KB' , 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subcat_id' => 'Categoria',
            'name' => 'Nome',
            'description' => 'Descrição',
            'created' => 'Publicação',
            'updated' => 'Alteração',
            'docname' => 'Nome do Arquivo',
            'file' => 'Arquivo',
            'is_active' => 'Ativo',
        ];
    }


    public function getImageFile()
    {
        return isset($this->docname) ? Yii::getAlias('@upload')."/".$this->docname : null;
    }
    public function getImageUrl()
    {
        // return a default image placeholder if your source attachment is not found
        $docname = isset($this->docname) ? $this->docname : 'default-attachment.png';
        return Yii::$app->params['uploadUrl'] . $docname;
    }
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $file = UploadedFile::getInstance($this, 'file');
 
        // if no image was uploaded abort the upload
        if (empty($file)) {
            return false;
        }
 
        // store the source file name
        $this->filename = $file->name;
        $ext = end((explode(".", $file->name)));
 
        // generate a unique file name
        $this->docname = "documento_".date("YmdHis").".{$ext}";
 
        // the uploaded image instance
        return $file;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachments()
    {
        return $this->hasMany(Attachments::className(), ['regulations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmMenuItems()
    {
        return $this->hasOne(AdmMenuItems::className(), ['id' => 'subcat_id']);
    }
}
