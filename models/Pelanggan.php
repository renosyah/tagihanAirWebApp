<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property string $id_pelanggan
 * @property string|null $nama_lengkap
 * @property string|null $email
 * @property string|null $no_telp
 * @property string|null $alamat
 */
// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // fungsi untuk menentukan
    // nama tabel yang akan diakses
    // oleh model
    public static function tableName()
    {
        return 'pelanggan';
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
            [['id_pelanggan'], 'required'],
            [['id_pelanggan'], 'integer', 'max' => 11],
            [['nama_lengkap', 'alamat'], 'string', 'max' => 50],
            [['email', 'no_telp'], 'string', 'max' => 20],
            [['id_pelanggan'], 'unique'],
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
            'id_pelanggan' => 'Id Pelanggan',
            'nama_lengkap' => 'Nama Lengkap',
            'email' => 'Email',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PelangganQuery the active query used by this AR class.
     */
    // fungsi untuk query data
    public static function find()
    {
        return new PelangganQuery(get_called_class());
    }
}
