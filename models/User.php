<?php

namespace app\models;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
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


    public static function findUsername($username)
    {
        return User::find()->where(['username' => $username])->one();
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::find()->where(['token' => $token])->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id_admin;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

     /**
     * @inheritdoc
     */    
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
