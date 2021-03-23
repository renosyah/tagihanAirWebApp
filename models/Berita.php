<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property int $id_berita
 * @property string|null $judul
 * @property string|null $tgl_berita
 * @property string|null $isi_berita
 * @property string|null $gambar
 * @property int $id_admin
 *
 * @property Admin $admin
 */

// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class Berita extends \yii\db\ActiveRecord
{

    // variabel untuk 
    // menampung value 
    // file 
    public $file_gambar;
    /**
     * {@inheritdoc}
     */

    // fungsi untuk menentukan
    // nama tabel yang akan diakses
    // oleh model
    public static function tableName()
    {
        return 'berita';
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
            [['isi_berita', 'gambar'], 'string'],
            [['id_admin'], 'required'],
            [['id_admin'], 'integer'],
            [['judul'], 'string', 'max' => 100],
            [['id_admin'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_admin' => 'id_admin']],
            [['file_gambar'], 'file', 'extensions' => 'png, jpg']
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
            'id_berita' => 'Id Berita',
            'judul' => 'Judul',
            'tgl_berita' => 'Tgl Berita',
            'isi_berita' => 'Isi Berita',
            'gambar' => 'Gambar',
            'id_admin' => 'Id Admin',
            'file_gambar' => 'File Gambar'
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
     * @return BeritaQuery the active query used by this AR class.
     */
    // fungsi untuk query data
    public static function find()
    {
        return new BeritaQuery(get_called_class());
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
