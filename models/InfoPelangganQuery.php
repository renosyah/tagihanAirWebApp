<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InfoPelanggan]].
 *
 * @see InfoPelanggan
 */
class InfoPelangganQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return InfoPelanggan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return InfoPelanggan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
