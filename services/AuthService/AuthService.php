<?php

namespace app\services\AuthService;

use Yii;
use app\models\User;
use app\models\forms\LoginForm;
use app\models\forms\RegisterForm;
use app\components\JwtAuth;

class AuthService
{
    public function register()
    {
        $form = new RegisterForm();

        $data = Yii::$app->request->bodyParams;

        if (!$form->load($data, '') || !$form->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $form->errors,
            ];
        }

        $user = new User();

        $user->username = $form->username;
        $user->email = $form->email;

        $user->password_hash = Yii::$app->security
            ->generatePasswordHash($form->password);

        $user->auth_key = Yii::$app->security
            ->generateRandomString();

        $user->status = 1;

        if (!$user->save()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $user->errors,
            ];
        }

        return [
            'success' => true,
            'message' => 'User muvaffaqiyatli yaratildi',
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
            ],

        ];
    }

    public function login()
    {
        $form = new LoginForm();

        $data = Yii::$app->request->bodyParams;

        if (!$form->load($data, '') || !$form->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $form->errors,
            ];
        }

        $user = User::findByUsername($form->username);

        if (
            !$user ||
            !Yii::$app->security->validatePassword(
                $form->password,
                $user->password_hash
            )
        ) {
            Yii::$app->response->statusCode = 401;

            return [
                'success' => false,
                'message' => 'Login yoki parol noto‘g‘ri',
            ];
        }

        $token = JwtAuth::encode($user->id);

        return [
            'success' => true,
            'message' => 'Login muvaffaqiyatli',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }
}
