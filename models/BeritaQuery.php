<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Berita]].
 *
 * @see Berita
 */

// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class BeritaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Berita[]|array
     */
    // fungsi untuk melakukan query
    // yang akan memberikan data list
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Berita|array|null
     */
    // fungsi untuk melakukan query
    // yang akan memberikan hanya satu data
    public function one($db = null)
    {
        return parent::one($db);
    }
}
