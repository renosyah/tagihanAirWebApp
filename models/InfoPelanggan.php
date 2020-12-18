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
            [['id_pelanggan'], 'string', 'max' => 12],
            [['denda'], 'string', 'max' => 100],
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
