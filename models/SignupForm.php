<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User']
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            // create user
            $user = new User();

            $user->username = $this->username;
            $user->generatePassword();
            $user->setAuthKey();
            $user->save();

            return $user;
        }

        return false;
    }
}
