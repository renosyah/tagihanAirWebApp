<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengumuman".
 *
 * @property int $id_pengumuman
 * @property string|null $id_kategori
 * @property string|null $judul
 * @property string|null $tgl_berita
 * @property string|null $isi_berita
 * @property int $id_admin
 *
 * @property Admin $admin
 */
class Pengumuman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengumuman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_berita'], 'safe'],
            [['isi_berita'], 'string'],
            [['id_admin'], 'required'],
            [['id_admin'], 'integer'],
            [['id_kategori', 'judul'], 'string', 'max' => 100],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengumuman' => 'Id Pengumuman',
            'id_kategori' => 'Id Kategori',
            'judul' => 'Judul',
            'tgl_berita' => 'Tgl Berita',
            'isi_berita' => 'Isi Berita',
            'id_admin' => 'Id Admin',
        ];
    }

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery|AdminQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * {@inheritdoc}
     * @return PengumumanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PengumumanQuery(get_called_class());
    }
}
