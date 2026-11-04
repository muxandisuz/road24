<?php

namespace app\components;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuth
{
    private const SECRET_KEY = 'road24_secret_key_2026_secure_random_key_123456';

    public static function encode($userId)
    {
        $payload = [
            'uid' => $userId,
            'iat' => time(),
            'exp' => time() + 3600,
        ];

        return JWT::encode($payload, self::SECRET_KEY, 'HS256');
    }

    public static function decode($token)
    {
        try {
            return JWT::decode(
                $token,
                new Key(self::SECRET_KEY, 'HS256')
            );
        } catch (\Exception $e) {
            return null;
        }
    }
}
