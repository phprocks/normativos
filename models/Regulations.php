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
 *
 * @property Attachments[] $attachments
 * @property Subcat $subcat
 */
class Regulations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regulations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subcat_id', 'name', 'description'], 'required'],
            [['subcat_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['name', 'description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subcat_id' => 'Subcat',
            'name' => 'Nome',
            'description' => 'Descrição',
            'created' => 'Publicação',
            'updated' => 'Alteração',
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
    public function getAdmMenuItems()
    {
        return $this->hasOne(AdmMenuItems::className(), ['id' => 'subcat_id']);
    }
}
