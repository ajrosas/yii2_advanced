<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Role;

/**
 * RoleSearch represents the model behind the search form of `common\models\Role`.
 */
class RoleSearch extends Role
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'level', 'record_status'], 'integer'],
            [['name', 'backend_module_access', 'frontend_module_access', 'role_access', 'backend_navigations', 'frontend_navigations', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Role::find();

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
            'level' => $this->level,
            'record_status' => $this->record_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'backend_module_access', $this->backend_module_access])
            ->andFilterWhere(['like', 'frontend_module_access', $this->frontend_module_access])
            ->andFilterWhere(['like', 'role_access', $this->role_access])
            ->andFilterWhere(['like', 'backend_navigations', $this->backend_navigations])
            ->andFilterWhere(['like', 'frontend_navigations', $this->frontend_navigations]);

        return $dataProvider;
    }
}
