<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Berita;

/**
 * BeritaSearch represents the model behind the search form of `app\models\Berita`.
 */

// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class BeritaSearch extends Berita
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
            [['id_berita', 'id_admin'], 'integer'],
            [['judul', 'tgl_berita', 'isi_berita', 'gambar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // fungsi skenario
    public function scenarios()
    {
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
        $query = Berita::find();

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
            'id_berita' => $this->id_berita,
            'tgl_berita' => $this->tgl_berita,
            'id_admin' => $this->id_admin,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi_berita', $this->isi_berita])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
