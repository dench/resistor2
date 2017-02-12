<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ObjectSearch represents the model behind the search form about `app\models\Property`.
 */
class PropertySearch extends Property
{
    public $year_from;
    public $year_to;
    public $covered_from;
    public $covered_to;
    public $uncovered_from;
    public $uncovered_to;
    public $plot_from;
    public $plot_to;
    public $bathroom_from;
    public $bathroom_to;
    public $bedroom_from;
    public $bedroom_to;
    public $price_from;
    public $price_to;
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[
                'id', 'object_id', 'region_id', 'location_id', 'type_id', 'parking_id', 'stage_id', 'bathroom', 'bedroom',
                'solarpanel', 'sauna', 'furniture', 'conditioner', 'heating', 'pantry', 'tennis',
                /*'year_from', 'year_to',
                'covered_from', 'covered_to',
                'uncovered_from', 'uncovered_to',
                'plot_from', 'plot_to',
                'bathroom_from', 'bathroom_to',
                'bedroom_from', 'bedroom_to',
                'price_from', 'price_to',*/
                'status_id', 'sold_id', 'created_at', 'updated_at', 'top', 'titul'
            ], 'integer'],
            [[
                'code', 'name', 'commission', 'address', 'view_ids', 'near_ids'
            ], 'safe'],
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
        $query = Property::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (!empty($this->name)) {
            $query->leftJoin('property_lang lang', 'lang.property_id = property.id');
            $query->groupBy('property.id');
        }

        if ($this->view_ids) {
            $query->leftJoin('property_view view', 'view.property_id = property.id');
            $query->groupBy('property.id');
        }
        if ($this->near_ids) {
            $query->leftJoin('property_near near', 'near.property_id = property.id');
            $query->groupBy('property.id');
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'object_id' => $this->object_id,
            'user_id' => $this->user_id,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'stage_id' => $this->stage_id,
            'year' => $this->year,
            'region_id' => $this->region_id,
            'location_id' => $this->location_id,
            'covered' => $this->covered,
            'uncovered' => $this->uncovered,
            'plot' => $this->plot,
            'bathroom' => $this->bathroom,
            'bedroom' => $this->bedroom,
            'parking_id' => $this->parking_id,
            'solarpanel' => $this->solarpanel,
            'sauna' => $this->sauna,
            'furniture' => $this->furniture,
            'conditioner' => $this->conditioner,
            'heating' => $this->heating,
            'pantry' => $this->pantry,
            'tennis' => $this->tennis,
            'top' => $this->top,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'lang.name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['>=', 'price', $this->price_from])
            ->andFilterWhere(['<=', 'price', $this->price_to])
            ->andFilterWhere(['>=', 'year', $this->year_from])
            ->andFilterWhere(['<=', 'year', $this->year_to])
            ->andFilterWhere(['>=', 'covered', $this->covered_from])
            ->andFilterWhere(['<=', 'covered', $this->covered_to])
            ->andFilterWhere(['>=', 'uncovered', $this->uncovered_from])
            ->andFilterWhere(['<=', 'uncovered', $this->uncovered_to])
            ->andFilterWhere(['>=', 'plot', $this->plot_from])
            ->andFilterWhere(['<=', 'plot', $this->plot_to])
            ->andFilterWhere(['>=', 'bathroom', $this->bathroom_from])
            ->andFilterWhere(['<=', 'bathroom', $this->bathroom_to])
            ->andFilterWhere(['>=', 'bedroom', $this->bedroom_from])
            ->andFilterWhere(['<=', 'bedroom', $this->bedroom_to])
            ->andFilterWhere(['in', 'view.view_id', $this->view_ids])
            ->andFilterWhere(['in', 'near.near_id', $this->near_ids]);

        return $dataProvider;
    }
}
