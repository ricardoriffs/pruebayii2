<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seccion as SeccionModel;

/**
 * Seccion represents the model behind the search form about `app\models\Seccion`.
 */
class Seccion extends SeccionModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'orden', 'num_hojas', 'album_id'], 'integer'],
            [['nombre'], 'safe'],
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
    public function search($params, $id)
    {
        $query = SeccionModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'orden' => $this->orden,
            'num_hojas' => $this->num_hojas,
            'album_id' => $this->album_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);
        $query->andFilterWhere(['album_id' => $id]);
        $query->addOrderBy(['orden' => SORT_ASC]);

        return $dataProvider;
    }
}
