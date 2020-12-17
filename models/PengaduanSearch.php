<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengaduan;

/**
 * PengaduanSearch represents the model behind the search form of `app\models\Pengaduan`.
 */
class PengaduanSearch extends Pengaduan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengaduan', 'id_admin'], 'integer'],
            [['pengaduan', 'id_pelanggan', 'penanganan', 'status'], 'safe'],
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
        $query = Pengaduan::find();

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
            'id_pengaduan' => $this->id_pengaduan,
            'id_admin' => $this->id_admin,
        ]);

        $query->andFilterWhere(['like', 'pengaduan', $this->pengaduan])
            ->andFilterWhere(['like', 'id_pelanggan', $this->id_pelanggan])
            ->andFilterWhere(['like', 'penanganan', $this->penanganan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
