<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
// class model untuk
// menangani data yang digunakan
// untuk login
class LoginForm extends Model
{
    // variabel username
    public $username;

    // variabel password
    public $password;

    // variabel flag apakah
    // user ingin tetap login
    public $rememberMe = true;

    // variabel private untuk
    // menyimpan data user
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    // list variabel yang akan menampung
    // value dan juga dengan tipe datanya
    // yang harus sesuai dengan tipe data
    // pada colomn di table database
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    // fungsi untuk mevalidasi password user
    // dengan password dari dastabase 
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    // fungsi login
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    // fungsi untuk mengambil data user
    // dari database
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findUsername($this->username);
        }

        return $this->_user;
    }
}
