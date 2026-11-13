<?php

namespace app\services;

use Yii;
use app\models\User;
use app\models\PasswordResetToken;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\BadRequestHttpException;

class PasswordResetService
{


    public function forgotPassword($email)
    {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new UnprocessableEntityHttpException(
                'Email formati noto‘g‘ri'
            );
        }

        $user = User::findOne([
            'email' => $email,
        ]);

        if (!$user) {
            throw new NotFoundHttpException("bu email dagi user topilmadi!");
        }

        $response = [
            'success' => true,
            'message' => 'Parolni tiklash havolasi emailingizga yuboriladi.'
        ];

        if (!$user) {
            return $response;
        }

        // Oldingi ishlatilmagan tokenlarni bekor qilish
        PasswordResetToken::deleteAll([
            'user_id' => $user->id,
            'used_at' => null,
        ]);

        // Yangi token yaratish
        $token = Yii::$app->security->generateRandomString(64);

        $resetToken = new PasswordResetToken();
        $resetToken->user_id = $user->id;
        $resetToken->token_hash = hash('sha256', $token);
        $resetToken->expires_at = date('Y-m-d H:i:s', time() + 1800);
        $resetToken->created_at = date('Y-m-d H:i:s');

        if (!$resetToken->save()) {
            Yii::error($resetToken->errors, 'password-reset');

            throw new ServerErrorHttpException(
                'Token yaratishda xatolik'
            );
        }

        $resetUrl = 'http://road25.uz/auth/reset-password?token='
            . urlencode($token);

        try {
            $sent = Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->params['supportEmail'])
                ->setTo($user->email)
                ->setSubject('Road24 - Parolni tiklash')
                ->setHtmlBody("
                <h2>Road24 parolni tiklash</h2>

                <p>Parolingizni tiklash uchun quyidagi havolani bosing:</p>

                <p>
                    <a href='{$resetUrl}'>Parolni tiklash</a>
                </p>

                <p>Havola 30 daqiqa davomida amal qiladi.</p>

                <p>Agar bu so‘rovni siz yubormagan bo‘lsangiz,
                ushbu xabarni e'tiborsiz qoldiring.</p>
            ")
                ->send();

            if (!$sent) {
                throw new \RuntimeException('Email yuborilmadi');
            }

        } catch (\Throwable $e) {
            Yii::error($e->getMessage(), 'password-reset');

            $resetToken->delete();

            throw new ServerErrorHttpException(
                'Email yuborishda xatolik yuz berdi'
            );
        }

        return $response;
    }


    public function resetPassword($token, $password)
    {
        if (empty($token) || empty($password)) {
            throw new UnprocessableEntityHttpException(
                'Token va yangi parol kiritilishi kerak'
            );
        }

        // Kelgan tokenni hash qilamiz
        $tokenHash = hash('sha256', $token);

        $now = date('Y-m-d H:i:s');

        // Token haqiqiy, ishlatilmagan va muddati tugamagan bo‘lishi kerak
        $resetToken = PasswordResetToken::find()
            ->where([
                'token_hash' => $tokenHash,
                'used_at' => null,
            ])
            ->andWhere(['>', 'expires_at', $now])
            ->one();

        if (!$resetToken) {
            throw new BadRequestHttpException(
                'Token noto‘g‘ri yoki muddati tugagan'
            );
        }

        $user = User::findOne($resetToken->user_id);

        if (!$user) {
            throw new BadRequestHttpException(
                'Foydalanuvchi topilmadi'
            );
        }

        $transaction = Yii::$app->db->beginTransaction();

        try {
            // Yangi parolni hash qilish
            $user->password_hash =
                Yii::$app->security->generatePasswordHash($password);

            if (!$user->save(false, ['password_hash'])) {
                throw new \RuntimeException(
                    'Yangi parolni saqlashda xatolik'
                );
            }

            // Tokenni ishlatilgan deb belgilash
            $resetToken->used_at = $now;

            if (!$resetToken->save(false, ['used_at'])) {
                throw new \RuntimeException(
                    'Tokenni yangilashda xatolik'
                );
            }

            $transaction->commit();

            return [
                'success' => true,
                'message' => 'Parol muvaffaqiyatli yangilandi',
            ];

        } catch (\Throwable $e) {
            $transaction->rollBack();

            Yii::error($e->getMessage(), 'password-reset');

            throw new ServerErrorHttpException(
                'Parolni yangilashda xatolik'
            );
        }
    }
}
