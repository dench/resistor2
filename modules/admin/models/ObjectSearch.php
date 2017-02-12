<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Object;

/**
 * ObjectSearch represents the model behind the search form about `app\models\Object`.
 */
class ObjectSearch extends Object
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'stage_id', 'status_id', 'type_id', 'year', 'region_id', 'location_id', 'covered', 'uncovered', 'plot', 'bathroom', 'bedroom', 'parking_id', 'solarpanel', 'sauna', 'furniture', 'conditioner', 'heating', 'pantry', 'tennis', 'created_at', 'updated_at'], 'integer'],
            [['coordinates', 'address', 'name', 'note_admin', 'code'], 'safe'],
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
        $query = Object::find();

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

        if (!empty($this->name)) {
            $query->leftJoin('object_lang lang', 'lang.object_id = object.id');
            $query->groupBy('object.id');
        }

        if ($this->view_ids) {
            $query->leftJoin('object_view view', 'view.object_id = object.id');
            $query->groupBy('object.id');
        }

        if ($this->view_ids) {
            $query->leftJoin('object_near near', 'near.object_id = object.id');
            $query->groupBy('object.id');
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'coordinates', $this->coordinates])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'note_admin', $this->address])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'lang.name', $this->name]);

        return $dataProvider;
    }
}
