<?php

namespace app\models;


// berikut ini adalah class 
// model yang akan digunakan untuk 
// melakukan fungsi CRUD
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    /**
     * @inheritdoc
     */
    // fungsi untuk menentukan
    // nama tabel yang akan diakses
    // oleh model
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    // list variabel yang akan menampung
    // value dan juga dengan tipe datanya
    // yang harus sesuai dengan tipe data
    // pada colomn di table database
    public function rules()
    {
        return [
            [['id_admin'], 'integer'],
            [['nama','username', 'password','token','auth_key'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    // fungsi untuk menampilkan
    // nama alias yang nanatinya akan
    // ditampilkan oleh class view
    public function attributeLabels()
    {
        return [
            'id_admin' => 'id admin',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
            'token' => 'Access Token',
            'auth_key' => 'Auth Key'
        ];
    }

    // fungsi untuk mengambil data admin
    // berdasarkan username admin
    public static function findUsername($username)
    {
        return User::find()->where(['username' => $username])->one();
    }


    /**
     * @inheritdoc
     */
    // fungsi untuk mengambil data admin
    // berdasarkan id admin
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * @inheritdoc
     */
    // fungsi untuk mengambil data admin
    // berdasarkan token
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::find()->where(['token' => $token])->one();
    }

    /**
     * @inheritdoc
     */
    // fungsi untuk mengambil id admin  
    public function getId()
    {
        return $this->id_admin;
    }

    /**
     * @inheritdoc
     */
    // fungsi untuk mengambil auth key
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    // fungsi untuk melakukan
    // validasi auth key    
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

     /**
     * @inheritdoc
     */
    // fungsi untuk melakukan
    // validasi password   
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    // fungsi untuk query data
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
