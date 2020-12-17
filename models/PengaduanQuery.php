<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pengaduan]].
 *
 * @see Pengaduan
 */
class PengaduanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pengaduan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pengaduan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
