<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Admregulations;

/**
 * AdmregulationsSearch represents the model behind the search form about `app\models\Admregulations`.
 */
class AdmregulationsSearch extends Admregulations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subcat_id', 'is_active'], 'integer'],
            [['name', 'description', 'created', 'updated', 'file'], 'safe'],
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
        $query = Admregulations::find();

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
            'subcat_id' => $this->subcat_id,
            'created' => $this->created,
            'updated' => $this->updated,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
