<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','type_user'], 'integer'],
            [['name','username', 'password','token','auth_key'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_user' => 'Type User',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'token' => 'Access Token',
            'auth_key' => 'Auth Key'
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug'
            ],
        ];
    }

    public static function findUsername($username)
    {
        return User::find()->where(['username' => $username,'type_user' => 0])->one();
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
        return $this->id;
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
     */    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
