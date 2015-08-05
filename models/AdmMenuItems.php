<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_items".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $icon
 * @property string $url
 * @property integer $visible
 * @property string $options
 * @property integer $parent_id
 */
class AdmMenuItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'required'],
            [['visible', 'parent_id'], 'integer'],
            [['options'], 'string'],
            [['name', 'label'], 'string', 'max' => 50],
            [['icon'], 'string', 'max' => 25],
            [['url'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'label' => 'Título da Categoria',
            'icon' => 'Icon',
            'url' => 'Url',
            'visible' => 'Ativo',
            'options' => 'Options',
            'parent_id' => 'Pertence a',
        ];
    }
    public function getAdmregulations()
    {
        return $this->hasMany(Admregulations::className(), ['subcat_id' => 'id']);
    }
    public static function getHierarchy() {
        $options = [];
         
        $parents = self::find()->where(['parent_id' => null])->all();
        foreach($parents as $id => $p) {
            $children = self::find()->where("parent_id=:parent_id", [":parent_id"=>$p->id])->all();
            $child_options = [];
            foreach($children as $child) {
                $child_options[$child->id] = $child->label;
            }
            $options[$p->label] = $child_options;
        }
        return $options;
    }    
}
