<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Regulations;

/**
 * RegulationsSearch represents the model behind the search form about `app\models\Regulations`.
 */
class RegulationsSearch extends Regulations
{
    /**
     * @inheritdoc
     */
    public $globalSearch;

    public function rules()
    {
        return [
            [['id', 'subcat_id'], 'integer'],
            [['name', 'description', 'created', 'updated', 'globalSearch'], 'safe'],
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
        $query = Regulations::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, 
                    ]
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
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
            'is_active' => 1,
        ]);

        $query->orFilterWhere(['like', 'name', $this->globalSearch])
            ->orFilterWhere(['like', 'description', $this->globalSearch]);

        return $dataProvider;
    }
}
