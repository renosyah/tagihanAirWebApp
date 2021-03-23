<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InfoPelanggan;

/**
 * InfoPelangganSearch represents the model behind the search form of `app\models\InfoPelanggan`.
 */
// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class InfoPelangganSearch extends InfoPelanggan
{
    /**
     * {@inheritdoc}
     */
    // list variabel yang akan menampung
    // value dan juga dengan tipe datanya
    // yang harus sesuai dengan tipe data
    // pada colomn di table database
    public function rules()
    {
        return [
            [['id_pelanggan', 'tgl_pembayaran', 'denda'], 'safe'],
            [['id_bayar'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // fungsi skenario
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
    // fungsi search yang berfungsi untuk
    // mengambil data list namun berdasarkan column
    // yang dicari
    public function search($params)
    {
        $query = InfoPelanggan::find();

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
            'id_bayar' => $this->id_bayar,
            'tgl_pembayaran' => $this->tgl_pembayaran,
        ]);

        $query->andFilterWhere(['like', 'id_pelanggan', $this->id_pelanggan])
            ->andFilterWhere(['like', 'denda', $this->denda]);

        return $dataProvider;
    }
}
