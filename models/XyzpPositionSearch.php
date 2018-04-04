<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\XyzpPosition;

/**
 * XyzpPositionSearch represents the model behind the search form of `app\models\XyzpPosition`.
 */
class XyzpPositionSearch extends XyzpPosition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'info_id', 'company_id', 'content_offset'], 'integer'],
            [['name', 'resume', 'city', 'create_time', 'update_time', 'sort', 'is_deleted'], 'safe'],
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
        $query = XyzpPosition::find()->select(['name','info_id'])->groupBy('name');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=>100],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'info_id' => $this->info_id,
        //     'company_id' => $this->company_id,
        //     'create_time' => $this->create_time,
        //     'update_time' => $this->update_time,
        //     'content_offset' => $this->content_offset,
        // ]);

        $query->orderBy(['create_time'=>SORT_DESC,'update_time'=>SORT_DESC]);

        // $query->andFilterWhere(['like', 'name', $this->name])
        //     ->andFilterWhere(['like', 'resume', $this->resume])
        //     ->andFilterWhere(['like', 'city', $this->city])
        //     ->andFilterWhere(['like', 'sort', $this->sort])
        //     ->andFilterWhere(['like', 'is_deleted', $this->is_deleted])
            
        $query ->andFilterWhere(['>=', 'create_time', '2017-09-01 00:00:00']);

        // $query->distinct();

        return $dataProvider;
    }
}
