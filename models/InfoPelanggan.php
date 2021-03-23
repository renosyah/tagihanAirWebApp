<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info_pelanggan".
 *
 * @property string $id_pelanggan
 * @property int|null $id_bayar
 * @property string|null $tgl_pembayaran
 * @property string|null $denda
 */
// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class InfoPelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // fungsi untuk menentukan
    // nama tabel yang akan diakses
    // oleh model
    public static function tableName()
    {
        return 'info_pelanggan';
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
            [['id_bayar'], 'integer'],
            [['tgl_pembayaran'], 'safe'],
            [['id_pelanggan'], 'integer', 'max' => 11],
            [['denda'], 'string', 'max' => 100],
            [['total_bayar'], 'string', 'max' => 100],
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
            'id_bayar' => 'Id Bayar',
            'tgl_pembayaran' => 'Tgl Pembayaran',
            'denda' => 'Denda',
            'total_bayar' => 'Total Bayar',
        ];
    }

    /**
     * {@inheritdoc}
     * @return InfoPelangganQuery the active query used by this AR class.
     */
    // fungsi untuk query data
    public static function find()
    {
        return new InfoPelangganQuery(get_called_class());
    }

    // fungsi intencept sebelum
    // data diinsert, tipe data tanggal
    // akan di format menyesuaikan dengan
    // format database
    public function beforeSave($insert)
	{
    	$this->tgl_pembayaran = Yii::$app->formatter->asDate($this->tgl_pembayaran, 'yyyy-MM-dd');
    	parent::beforeSave($insert);
    	return true;
	}
}
