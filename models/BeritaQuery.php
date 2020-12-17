<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Berita]].
 *
 * @see Berita
 */
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
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Berita|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
