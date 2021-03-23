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
// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class Pengumuman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // fungsi untuk menentukan
    // nama tabel yang akan diakses
    // oleh model    
    public static function tableName()
    {
        return 'pengumuman';
    }

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

    // fungsi untuk menampilkan
    // nama alias yang nanatinya akan
    // ditampilkan oleh class view  
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
    // fungsi untuk mengambil data admin
    // berdasarkan id admin    
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * {@inheritdoc}
     * @return PengumumanQuery the active query used by this AR class.
     */
    // fungsi untuk query data
    public static function find()
    {
        return new PengumumanQuery(get_called_class());
    }

    // fungsi intencept sebelum
    // data diinsert, tipe data tanggal
    // akan di format menyesuaikan dengan
    // format database
    public function beforeSave($insert)
	{
    	$this->tgl_berita = Yii::$app->formatter->asDate($this->tgl_berita, 'yyyy-MM-dd');
    	parent::beforeSave($insert);
    	return true;
	}
}
