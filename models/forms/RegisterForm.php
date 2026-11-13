<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Model;

class RegisterForm extends Model
{

    public $username;
    public $password;
    public $email;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => User::class],
            ['email', 'unique', 'targetClass' => User::class],
            ['password', 'string'],
        ];
    }
}
