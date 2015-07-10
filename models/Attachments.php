<?php

namespace app\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regulations_id', 'name'], 'required'],
            [['regulations_id'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regulations_id' => 'Regulations ID',
            'name' => 'Name',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegulations()
    {
        return $this->hasOne(Regulations::className(), ['id' => 'regulations_id']);
    }
}
