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
class Pengaduan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengaduan';
    }

    /**
     * {@inheritdoc}
     */
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
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * {@inheritdoc}
     * @return PengaduanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PengaduanQuery(get_called_class());
    }
}
