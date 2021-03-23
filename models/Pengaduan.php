<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengaduan".
 *
 * @property int $id_pengaduan
 * @property string|null $pengaduan
 * @property string|null $id_pelanggan
 * @property string|null $penanganan
 * @property string|null $status
 * @property int $id_admin
 *
 * @property Admin $admin
 */
// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class Pengaduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // fungsi untuk menentukan
    // nama tabel yang akan diakses
    // oleh model
    public static function tableName()
    {
        return 'pengaduan';
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
            [['pengaduan', 'penanganan', 'status'], 'string'],
            [['id_admin'], 'required'],
            [['id_admin'], 'integer'],
            [['id_pelanggan'], 'string', 'max' => 12],
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
            'id_pengaduan' => 'Id Pengaduan',
            'pengaduan' => 'Pengaduan',
            'id_pelanggan' => 'Id Pelanggan',
            'penanganan' => 'Penanganan',
            'status' => 'Status',
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
     * @return PengaduanQuery the active query used by this AR class.
     */
    // fungsi untuk query data
    public static function find()
    {
        return new PengaduanQuery(get_called_class());
    }
}
