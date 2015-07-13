<?php

namespace app\models;

use Yii;

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
    
    public function rules()
    {
        return [
            [['subcat_id', 'name', 'description', 'file', 'is_active'], 'required'],
            [['subcat_id', 'is_active'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'description', 'file'], 'string', 'max' => 100]
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
            'file' => 'Arquivo',
            'is_active' => 'Ativo',
        ];
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
    public function getSubcat()
    {
        return $this->hasOne(Subcat::className(), ['id' => 'subcat_id']);
    }
}
