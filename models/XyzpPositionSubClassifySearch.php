<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\XyzpPositionSubClassify;

/**
 * XyzpPositionSubClassifySearch represents the model behind the search form of `\app\models\XyzpPositionSubClassify`.
 */
class XyzpPositionSubClassifySearch extends XyzpPositionSubClassify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'info_id', 'class'], 'integer'],
            [['create_time'], 'safe'],
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
        $query = XyzpPositionSubClassify::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'info_id' => $this->info_id,
            'class' => $this->class,
            'create_time' => $this->create_time,
        ]);

        return $dataProvider;
    }
}
