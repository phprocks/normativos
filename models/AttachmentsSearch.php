<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attachments;

/**
 * AttachmentsSearch represents the model behind the search form about `app\models\Attachments`.
 */
class AttachmentsSearch extends Attachments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'regulations_id'], 'integer'],
            [['attachlabel', 'attachname','created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Attachments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'regulations_id' => $this->regulations_id,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'attachlabel', $this->attachlabel]);

        return $dataProvider;
    }
}
