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
class InfoPelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info_pelanggan';
    }

    /**
     * {@inheritdoc}
     */
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
    public static function find()
    {
        return new InfoPelangganQuery(get_called_class());
    }

    public function beforeSave($insert)

	{

    	$this->tgl_pembayaran = Yii::$app->formatter->asDate($this->tgl_pembayaran, 'yyyy-MM-dd');

    	parent::beforeSave($insert);

    	return true;

	}
}
