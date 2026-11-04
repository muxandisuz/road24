<?php

namespace app\services\AuthService;

use Yii;
use app\components\JwtAuth;
use app\models\User;
use yii\filters\auth\AuthInterface;

class AuthService
{

    public function register()
    {
        $model = new User();
        $model->scenario = 'register';

        $data = Yii::$app->request->bodyParams;

        if ($model->load($data, '')) {
            if ($model->validate()) {
                $model->password_hash = Yii::$app->security
                    ->generatePasswordHash($model->password);

                $model->status = 1;

                if ($model->save(false)) {
                    return [
                        'success' => true,
                        'message' => 'User muvaffaqiyatli yaratildi',
                        'user' => $model
                    ];
                }
            }
        }

        Yii::$app->response->statusCode = 422;

        return [
            'success' => false,
            'errors' => $model->errors,
        ];
    }

    public function login()
    {
        $data = Yii::$app->request->bodyParams;

        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;

        $user = User::findByUsername($username);

        if (!$user || !Yii::$app->security->validatePassword(
                $password,
                $user->password_hash
            )) {
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
