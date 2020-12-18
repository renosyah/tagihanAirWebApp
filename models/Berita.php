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
class Berita extends \yii\db\ActiveRecord
{

    public $file_gambar;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * {@inheritdoc}
     */
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
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id_admin' => 'id_admin']);
    }

    /**
     * {@inheritdoc}
     * @return BeritaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BeritaQuery(get_called_class());
    }

    public function beforeSave($insert)

	{

    	$this->tgl_berita = Yii::$app->formatter->asDate($this->tgl_berita, 'yyyy-MM-dd');

    	parent::beforeSave($insert);

    	return true;

	}
}
