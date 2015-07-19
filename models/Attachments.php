<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "attachments".
 *
 * @property integer $id
 * @property integer $regulations_id
 * @property string $name
 * @property string $created
 *
 * @property Regulations $regulations
 */
class Attachments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachments';
    }

    public $file;
    public $filename;
    //public $attachlabel;    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regulations_id', 'attachname', 'attachlabel'], 'required'],
            [['regulations_id'], 'integer'],
            [['created'], 'safe'],
            [['file', 'filename'], 'safe'],            
            [['attachlabel'], 'string', 'max' => 40],
            [['file'], 'file', 'extensions' => 'pdf, doc, docx, xls, xlsx', 'maxSize' => 5120000, 'tooBig' => 'Arquivo acima do limite de 5 MB' , 'skipOnEmpty' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regulations_id' => 'Pertence ao',
            'attachname' => 'Nome do Anexo',
            'created' => 'Publicado',
            'attachlabel' => 'Título do Anexo',
            'file' => 'Arquivo',
        ];
    }

    public function getImageFile()
    {
        return isset($this->attachname) ? Yii::getAlias('@upload')."/".$this->attachname : null;
    }
    public function getImageUrl()
    {
        // return a default image placeholder if your source attachment is not found
        $attachname = isset($this->attachname) ? $this->attachname : 'default-attachname.png';
        return Yii::$app->params['uploadUrl'] . $attachname;
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
        $this->attachname = "anexo_".date("YmdHis").".{$ext}";
 
        // the uploaded image instance
        return $file;
    }    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegulations()
    {
        return $this->hasOne(Regulations::className(), ['id' => 'regulations_id']);
    }
}
